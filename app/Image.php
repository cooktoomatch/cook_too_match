<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function cook()
    {
        return $this->belongsTo('App\Cook');
    }
}
