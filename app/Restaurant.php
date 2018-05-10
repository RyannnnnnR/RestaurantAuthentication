<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function posts()
    {
      return $this->hasMany('App\Post');
    }
    public function country()
    {
      return $this->belongsTo('App\Country');
    }
    public function category()
    {
      return $this->belongsTo('App\Category');
    }
}
