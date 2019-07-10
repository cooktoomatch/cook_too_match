<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function goods()
    {
        return $this->hasMany('App\Good');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }
}
