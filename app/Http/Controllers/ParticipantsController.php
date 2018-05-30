<?php

namespace App\Http\Controllers;

use App\Participant;
use App\Tournament;
use Illuminate\Http\Request;

class ParticipantsController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  public function store(Tournament $tournament) {
    $tournament->addParticipant();
    // dd($tournament);
    // Participant::create([
    //   'user_id' => auth()->user()->id,
    //   'tournament_id' => $tournament->id,
    // ]);

    return redirect("/tournaments/{$tournament->id}");
  }
}
