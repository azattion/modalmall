<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function images(){
        return $this->hasMany('App\Admin\Image', 'pid');
    }
}
