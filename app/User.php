<?php

namespace App;

use Laravel\Passport\HasApiTokens;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

        protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token','password'
    ];

    public function bordados()
    {
        return $this->hasMany('App\Bordado');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function userLikes(integer $id){
        return User::where('id',$id)
                        ->with('likes')
                        ->get();
    }

}
