<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserAvatarsController extends Controller {
  public function store() {
    $this->validate(request(), [
      'avatar' => ['required', 'image'],
    ]);

    // $path = Storage::putFile('avatars', request->file('avatar'));
    // echo $path;

    auth()->user()->update([
      'avatar_path' => request()->file('avatar')->store('avatars', 'public')
      // 'avatar_path' => $path
    ]);

    return response([], 204);

    return back();
  }
}
