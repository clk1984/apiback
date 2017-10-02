<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table="likes";

    protected $fillable = [
        'user_id','bordado_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function bordado()
    {
        return $this->belongsTo('App\Bordado','bordado_id');
    }

}
