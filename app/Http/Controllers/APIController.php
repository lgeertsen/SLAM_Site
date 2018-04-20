<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Participant;
use App\Tournament;
use App\User;

use App\Http\Resources\TournamentResource;
use App\Http\Resources\TournamentCollection;
use App\Http\Resources\UserResource;

use Illuminate\Http\Request;

class APIController extends Controller {
  public function user(Request $request) {
    UserResource::withoutWrapping();

    return new UserResource(User::where('email', $request->query('email'))->first());
  }

  public function tournaments() {
    return new TournamentCollection(Tournament::all());
  }

  public function tournament($id) {
    TournamentResource::withoutWrapping();

    return new TournamentResource(Tournament::find($id));
  }

  public function results($id, Request $request) {
    $results = $request->input('results');

    $tournament = Tournament::find($id);
    $tournament->finished = true;
    $tournament->save();

    foreach ($results as $result) {
      $user = User::find($result['id']);
      $user->elo = $result['elo'];
      $user->save();
      $participant = Participant::where([
        ['user_id', $user->id],
        ['tournament_id', $tournament->id]
      ])->get();
      $participant->played = true;
      $participant->oldElo = $result['eloStart'];
      $participant->newElo = $result['elo'];
      $participant->rank = $result['rank'];
      $participant->rankNb = $result['rankNb'];
      $participant->save();
    }

    return response()->json([
        'tournament' => $tournament
    ]);
  }
}
