<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsAccount extends Model
{
    protected $fillable = [
        'user_id',
        'login',
        'type',
        'pw',
        'expiration',
        'kind',
        'price',
        'cost',
        'currency',
        'price_expiration',
    ];


    protected $hidden = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
