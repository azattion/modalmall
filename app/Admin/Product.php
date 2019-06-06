<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'prod_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\Admin\Image', 'pid');
    }

}
