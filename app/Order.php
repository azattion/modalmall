<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items(){
        return $this->hasMany('App\OrderItem', 'oid');
    }

    public function user(){
        return $this->belongsTo('App\User', 'uid');
    }

    public function delete()
    {
        $this->items()->delete();
        return parent::delete();
    }
}
