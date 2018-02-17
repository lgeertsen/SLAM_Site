<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;

class TeamsController extends Controller {
  public function __construct() {
    $this->middleware('auth')->except(['show']);
  }

  public function create(Tournament $tournament) {
    return view('teams.create', [
      'size' => $tournament->teamSize,
    ]);
  }
}
