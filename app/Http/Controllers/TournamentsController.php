<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{
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
      'sport' => 'required',
      'date' => 'required',
    ]);

    Tournament::create([
      'sport' => request('sport'),
      'date' => request('date'),
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
    $participants = $tournament->participants()->get();

    return view('tournaments.show', [
      'tournament' => $tournament,
      'participants' => $participants,
      'participantsCount' => $participants->count(),
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
