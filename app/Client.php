<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id', 'country_code', 'phone_number', 'client_name'];

    protected $hidden = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
