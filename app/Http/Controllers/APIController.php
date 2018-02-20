<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\User;
use App\Http\Resources\TournamentResource;
use App\Http\Resources\TournamentCollection;
use App\Http\Resources\UserResource;

use Illuminate\Http\Request;

class APIController extends Controller {
  public function user(Request $request) {
    UserResource::withoutWrapping();

    return new UserResource(User::where('email', $request->query('email')));
  }

  public function tournaments() {
    return new TournamentCollection(Tournament::all());
  }

  public function tournament($id) {
    TournamentResource::withoutWrapping();

    return new TournamentResource(Tournament::find($id));
  }
}
