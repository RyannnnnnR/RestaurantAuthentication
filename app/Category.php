<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
    'id',
    'name',
    'updated_at',
  ];
    public function restaurants(){
      return $this->hasMany('App\Restaurant');
    }
}
