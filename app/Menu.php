<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $table = 'menu';

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }
}
