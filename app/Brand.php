<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

//    public function product(){
//        return $this->belongsTo('App\Product', 'brand');
//    }
}
