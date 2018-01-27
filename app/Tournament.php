<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model {
  protected $guarded = [];

  public function participants() {
    return $this->hasMany(Participant::class, 'tournament_id');
  }

  public function addParticipant() {
    $attributes = ['user_id' => auth()->id()];

    if(! $this->participants()->where($attributes)->exists()) {
      return $this->participants()->create($attributes);
    }
  }
}
