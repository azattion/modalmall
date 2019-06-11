<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('App\Product', 'pid');
    }

    public function scopePublish($query){
        return $query->where('status', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne('App\User', 'uid');
    }
}
