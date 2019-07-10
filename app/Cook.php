<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cook extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function goods() {
        return $this->hasMany('App\Good');
    }

    // 二点間の距離を計測する関数
    // 参考: http://kudakurage.hatenadiary.com/entry/20100319/1268986000
    public function set_distance($lat, $lng) {
        $lat_average = deg2rad( $lat + (($this->user->latitude - $lat) / 2) );
        $lat_difference = deg2rad( $lat - $this->user->latitude );
        $lon_difference = deg2rad( $lng - $this->user->longitude );
        $curvature_radius_tmp = 1 - 0.00669438 * pow(sin($lat_average), 2);
        $meridian_curvature_radius = 6335439.327 / sqrt(pow($curvature_radius_tmp, 3));
        $prime_vertical_circle_curvature_radius = 6378137 / sqrt($curvature_radius_tmp);
        
        $distance = pow($meridian_curvature_radius * $lat_difference, 2) + pow($prime_vertical_circle_curvature_radius * cos($lat_average) * $lon_difference, 2);
        $distance = sqrt($distance);

        return $distance;

    public function image()
    {
        return $this->hasOne('App\Image');
    }
}

