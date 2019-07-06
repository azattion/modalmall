<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Category', 'cat');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'pid');
    }

    public function favorite()
    {
        return $this->hasOne('App\Favorite', 'pid');
    }

    public function isFavorite()
    {
        return $this->hasOne('App\Favorite', 'pid');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function brands()
    {
        return $this->hasOne('App\Brand', 'id', 'brand');
    }

//    public static function costWithSale(Product $product)
//    {
//        $cost = $product['cost'];
//        if ($product['sale_percent'] && strtotime($product['sale_start_date']) < time() && strtotime($product['sale_end_date']) > time()) {
//            $cost = $product['cost'] - $product['cost'] / 100 * $product['sale_percent'];
//        }
//        return $cost;
//    }

    public function getIsSaleAttribute()
    {
        return $this->attributes['sale_percent'] && strtotime($this->attributes['sale_start_date']) < time() && strtotime($this->attributes['sale_end_date']) > time();
    }

    public function getCostWithSaleAttribute()
    {
        $cost = $this->attributes['cost'];
        if ($this->getIsSaleAttribute()) {
            $cost = $this->attributes['cost'] - $this->attributes['cost'] / 100 * $this->attributes['sale_percent'];
        }
        return $cost;
    }

}
