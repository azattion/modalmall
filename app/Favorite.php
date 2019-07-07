<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use SoftDeletes;
    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'pid');
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
