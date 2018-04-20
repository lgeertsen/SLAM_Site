<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LeaderboardsController extends Controller {
  public function index() {
    $users = User::orderBy('elo', 'desc')->get();
    return view('leaderboard.index', compact('users'));
  }
}
