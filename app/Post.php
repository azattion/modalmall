<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    public function images(){
//        return $this->hasMany('App\Image', 'pid');
//    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
