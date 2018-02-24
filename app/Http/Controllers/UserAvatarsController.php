<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAvatarsController extends Controller {
  public function store() {
    $this->validate(request(), [
      'avatar' => ['required', 'image'],
    ]);

    auth()->user()->update([
      'avatar_path' => request()->file('avatar')->store('avatars', 'public')
    ]);

    return response([], 204);

    return back();
  }
}