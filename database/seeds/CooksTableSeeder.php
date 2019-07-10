<?php

use Illuminate\Database\Seeder;
use App\Cook;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Cook::class, 300)->create();

        $faker = Faker::create('ja_JP');

        for ($i = 1; $i < count(User::All()); $i++) {
            Cook::create([
                'name' => $faker->sentence(10),
                'description' => $faker->realText(150),
                'user_id' => $i,
                'price' => mt_rand(1000, 100000000),
                'num' => mt_rand(1, 15),
                'etc' => $faker->realText(),
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now(),
            ]);
        }

        for ($i = 1; $i < count(User::All()); $i++) {
            Cook::create([
                'name' => $faker->sentence(10),
                'description' => $faker->realText(150),
                'user_id' => $i,
                'price' => mt_rand(1000, 100000000),
                'num' => mt_rand(1, 15),
                'etc' => $faker->realText(),
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now(),
            ]);
        }

        for ($i = 1; $i < count(User::All()); $i++) {
            Cook::create([
                'name' => $faker->sentence(10),
                'description' => $faker->realText(150),
                'user_id' => $i,
                'price' => mt_rand(1000, 100000000),
                'num' => mt_rand(1, 15),
                'etc' => $faker->realText(),
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now(),
            ]);
        }

        for ($i = 1; $i < count(User::All()); $i++) {
            Cook::create([
                'name' => $faker->sentence(10),
                'description' => $faker->realText(150),
                'user_id' => $i,
                'price' => mt_rand(1000, 100000000),
                'num' => mt_rand(1, 15),
                'etc' => $faker->realText(),
                'start_time' => Carbon::now(),
                'end_time' => Carbon::now(),
            ]);
        }
    }
}
