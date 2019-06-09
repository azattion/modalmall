<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
//    protected $guarded = ['ext', 'path', 'status', 'uid', 'name', 'width', 'height'];
    protected $guarded = [];
}