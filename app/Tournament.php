<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model {
  public function participants() {
    return $this->hasMany(Participant::class, 'tournament_id');
  }
}
