<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ['user_id','category_id','post_title','body'];

    protected $hidden = [];

    public function Category(){
        return $this->hasOne('App\Category','category_id');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
