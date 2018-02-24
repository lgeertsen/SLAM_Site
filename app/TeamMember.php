<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model {
  protected $guarded = [];

  protected static function boot() {
    parent::boot();

    static::addGlobalScope('user', function($builder) {
      $builder->with('user');
    });

    static::deleting(function($thread) {
      $thread->replies->each->delete();
    });
  }

  public function user() {
    return $this->belongsTo(User::class, 'user_id');
  }
}
