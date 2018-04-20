<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Tournament;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller {
  public function show(User $user) {
    $elo = Participant::where([
      ['user_id', $user->id],
      ['played', true]
    ])->pluck('newElo');

    $tournaments = Tournament::join('participants', 'tournaments.id', '=', 'participants.tournament_id')->where([
      ['finished', true],
      ['user_id', $user->id],
      ['played', true]
    ])->orderBy('tournaments.created_at', 'desc')->get();

    return view('profiles.show', [
      'profileUser' => $user,
      'elo' => $elo,
      'tournaments' => $tournaments
    ]);
  }
}
