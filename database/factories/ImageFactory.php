<?php

use Faker\Generator as Faker;
use App\Cook;
use Illuminate\Support\Facades\Storage;

$factory->define(App\Image::class, function (Faker $faker) {

    $cook_images = Storage::allFiles('public/cook_image');

    return [
        'cook_id' => mt_rand(1, count(Cook::all())),
        'image' => substr($cook_images[mt_rand(1, count($cook_images) - 1)], 18),
    ];
});
