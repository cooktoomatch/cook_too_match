<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use App\User;


$factory->define(App\Cook::class, function (Faker $faker) {

    return [
        'name' => $faker->sentence(10),
        'description' => $faker->realText(150),
        'user_id' => mt_rand(1, count(User::All())),
        'price' => mt_rand(1000, 100000000),
        'num' => mt_rand(1, 15),
        'etc' => $faker->realText(),
        'start_time' => Carbon::now(),
        'end_time' => Carbon::now(),
    ];
});
