<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'name', 'email', 'api_token', 'password',
    ];


    protected $hidden = [
        'api_token', 'password', 'remember_token',
    ];

    public function whatsAccounts(){
        return $this->hasMany('App\WhatsAccount');
    }

    public function randWhatsAccount(){
        return $this->whatsAccounts()
            ->orderByRaw("RAND()")
            ->take(1);
    }

    public function Clients(){
        return $this->hasMany('App\Client');
    }
}
