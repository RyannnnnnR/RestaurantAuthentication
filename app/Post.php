<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts';
  protected $fillable = [
    'id',
    'content',
    'user_id',
    'restaurant_id',
  ];
    public function restaurant(){
      return $this->belongsTo('App\Restaurant');
    }
    public function comments(){
      return $this->hasMany('App\Comment');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
}
