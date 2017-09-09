<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bordados extends Model
{
     protected $fillable = [
        'name', 'description', 'path',
    ];
    protected  $hidden =['user_id'];

    public function user()
    {
        return $this->belongsTo('App\Bordados');
    }
}
