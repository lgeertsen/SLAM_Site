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

    // Participant::create([
    //   'user_id' => request('sport'),
    //   'tournament_id' => request('date'),
    // ]);

    return redirect("/tournaments/{$tournament->id}");
  }
}
