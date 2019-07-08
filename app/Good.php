<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    public function cook() {
        return $this->belongsTo('App\Cook');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
