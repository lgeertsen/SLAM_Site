<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;

class TournamentsController extends Controller {

  public function __construct() {
    $this->middleware('auth')->except(['index', 'show']);
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $tournaments = Tournament::latest()->get();

    return view('tournaments.index', compact('tournaments'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view('tournaments.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    $this->validate($request, [
      'name' => 'required',
      'sport' => 'required',
      'date' => 'required',
      'teamSize' => 'required',
    ]);

    Tournament::create([
      'name' => request('name'),
      'sport' => request('sport'),
      'date' => request('date'),
      'teamSize' => request('teamSize'),
    ]);

    return redirect('/tournaments');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\tournament  $tournament
  * @return \Illuminate\Http\Response
  */
  public function show(tournament $tournament) {
    $teams = $tournament->teams()->get();

    return view('tournaments.show', [
      'tournament' => $tournament,
      'teams' => $teams,
      'teamCount' => $teams->count(),
    ]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\tournament  $tournament
  * @return \Illuminate\Http\Response
  */
  public function edit(tournament $tournament)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\tournament  $tournament
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, tournament $tournament)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\tournament  $tournament
  * @return \Illuminate\Http\Response
  */
  public function destroy(tournament $tournament)
  {
    //
  }
}
