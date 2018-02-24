<?php

namespace App\Http\Controllers;

use App\Sport;
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
  public function index(Sport $sport) {

    if($sport->exists) {
      $tournaments = Tournament::latest()->where('sport_id', $sport->id)->with('sport')->get();
      return view('tournaments.index', [
        'tournaments' => $tournaments,
        'sport' => $sport->name,
        'url' => $sport->url
      ]);
    } else {
      $tournaments = Tournament::latest()->with('sport')->get();
      return view('tournaments.index', compact('tournaments'));
    }

    // dd($tournaments);
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
      'sport_id' => 'required',
      'date' => 'required',
      'teamSize' => 'required',
      'description' => 'required',
    ]);

    Tournament::create([
      'name' => request('name'),
      'sport_id' => request('sport_id'),
      'date' => request('date'),
      'teamSize' => request('teamSize'),
      'description' => request('description'),
    ]);

    return redirect('/tournaments');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\tournament  $tournament
  * @return \Illuminate\Http\Response
  */
  public function show($sport, Tournament $tournament) {
    $teams = $tournament->teams()->with('members')->get();

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
