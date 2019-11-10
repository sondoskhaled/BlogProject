<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
// protected $table ="new table name";

//public $primaryKey="any cloumn";

public function user(){

    return $this->belongsTo('App\User','user_id');
}

public function comments(){

    return $this->hasMany('App\Comment');
}

public function tags(){
    return $this->belongsToMany('App\Tag');
}
}