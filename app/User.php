<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
  use HasApiTokens, Notifiable;

  protected $fillable = [
    'name', 'email', 'password', 'avatar_path',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function getAvatarPathAttribute($avatar) {
    if(!$avatar) {
      return '/img/avatars/default.png';
    }
    return '/storage/' . $avatar;
  }
}
