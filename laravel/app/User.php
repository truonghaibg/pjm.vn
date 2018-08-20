<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $users ='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function username()
    {
        return "user_email";
    }
    protected $fillable = [
        'user_name', 'user_email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function comment(){
        return $this->hasMany('App\Comment','user_id','id');
    }
}
