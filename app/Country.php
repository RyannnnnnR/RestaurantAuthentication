<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  protected $table = 'countries';
  protected $fillable = [
    'id',
    'name',
    'updated_at',
  ];

  public function users(){
    return $this->hasMany('App\User');
  }
  public function restaurants(){
    return $this->hasMany('App\Restaurant');
  }
}
