<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'users';
  protected $fillable = [
    'name',
    'email',
    'password',
    'country_id'
  ];
  public function posts(){
    return $this->belongsTo('App\Post');
  }
  public function comments(){
    return $this->belongsTo('App\Comment');
  }
  public function roles(){
    return $this->belongsToMany('App\Role');
  }
  public function country()
  {
    return $this->belongsTo('App\Country');
  }
}
/*
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
      return $this->belongsTo('App\Post');
    }
    public function comments(){
      return $this->belongsTo('App\Comment');
    }
    public function roles(){
      return $this->belongsToMany('App\Role');
    }
    public function country()
    {
      return $this->belongsTo('App\Country');
    }

}
*/
