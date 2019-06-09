<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function product()
    {
        return $this->hasOne('App\Product', 'prod_id');
    }

    public function scopeUser($query)
    {
        return auth()->id() && $query->where('uid', auth()->id());
    }

    public function user()
    {
        return $this->hasOne('App\User', 'uid');
    }
}
