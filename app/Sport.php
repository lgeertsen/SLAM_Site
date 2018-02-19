<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model {
  public function getRouteKeyName() {
    return 'slug';
  }
  
  public function tournaments() {
    return $this->hasMany(Tournament::class);
  }
}
