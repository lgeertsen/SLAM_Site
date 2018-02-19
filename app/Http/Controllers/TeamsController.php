<?php

namespace App\Http\Controllers;

use App\Sport;
use App\Team;
use App\TeamMember;
use App\Tournament;
use Illuminate\Http\Request;

class TeamsController extends Controller {
  public function __construct() {
    $this->middleware('auth')->except(['show']);
  }

  public function create(Sport $sport, Tournament $tournament) {
    return view('teams.create', [
      'tournament' => $tournament,
      'size' => $tournament->teamSize,
    ]);
  }

  public function store(Request $request, Sport $sport, Tournament $tournament) {
    $this->validate($request, [
      'name' => 'required',
    ]);

    $team = Team::create([
      'name' => request('name'),
      'tournament_id' => $tournament->id,
      'size' => $tournament->teamSize,
    ]);

    for($i=0; $i < count(request('players')); $i++) {
      $teamMember = TeamMember::create([
        'user_id' => $request->input('playersId.' . $i),
        'team_id' => $team->id,
      ]);
    }

    return redirect()->route('tournaments.show', [
      'sport' => $sport->slug,
      'tournament' => $tournament->id]);
  }

  public function show($sport, Tournament $tournament, Team $team) {
    $teamMembers = $team->members()->get();

    return view('teams.show', [
      'tournament' => $tournament,
      'team' => $team,
      'teamMembers' => $teamMembers,
    ]);
  }
}
