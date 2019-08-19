<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function scopeNestedtree($query)
    {
        $tree = [];
        foreach ($query->get() as $v) {
            $tree[$v["pid"]][] = $v;
        }
        return $tree;
    }

    public function scopeList($query)
    {
        $tree = [];
        foreach ($query->get() as $v) {
            $tree[$v["id"]] = $v;
        }
        return $tree;
    }
}
