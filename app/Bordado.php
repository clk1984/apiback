<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bordado extends Model
{

    protected $table = 'bordados';

    protected $fillable = [
        'name', 'description', 'path','user_id'
    ];
    protected  $hidden =[];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
     public function likes()
    {
        return $this->hasMany('App\Like');
    }
    public static function showLikes(){
         return Bordado::with('likes')
                        ->with('user')
                        ->get();

    }
}
