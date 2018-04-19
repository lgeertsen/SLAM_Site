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

  public function results(Tournament $tournament, Request $request) {
    Log::info($request);
    return $request;
  }
}
