<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Http\Resources\TournamentResource;
use App\Http\Resources\TournamentCollection;


use Illuminate\Http\Request;

class APIController extends Controller {
  public function tournaments() {
    return new TournamentCollection(Tournament::all());
  }

  public function tournament($id) {
    TournamentResource::withoutWrapping();

    return new TournamentResource(Tournament::find($id));
  }
}
