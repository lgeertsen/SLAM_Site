<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

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
    Log::info($results);
    foreach ($results as $result) {
      $user = User::find($result['id']);
      $user->elo = $result['elo'];
      $user->save();
    }



    $tournament = Tournament::find($id);

    return response()->json([
        'tournament' => $tournament
    ]);
  }
}
