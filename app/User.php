<?php
namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use hasApiTokens, Notifiable;


    protected $fillable = [
        'country_id','name', 'email', 'password',
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

