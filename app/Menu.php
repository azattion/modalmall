<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
