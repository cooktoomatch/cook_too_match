<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;
use App\User;
use App\Comment;
use App\Cook;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_icons = Storage::allFiles('public/user_icon');


        $faker = Faker::create('ja_JP');

        User::create([
            'name' => 'kaka',
            'email' => 'kaka@gmail.com',
            'password' => Hash::make('asdfghjkl'),
            'icon' => substr($user_icons[1], 17),
            'description' => 'kaka',
            'address' => $faker->address,
        ]);

        User::create([
            'name' => 'aaa',
            'email' => 'a@a.com',
            'password' => Hash::make('aaaaaa'),
            'icon' => substr($user_icons[0], 17),
            'description' => 'aaaです、こんにちは',
            'address' => $faker->address,
        ]);

        // Cook::create([
        //     'name' => 'カレーパンマン',
        //     'description' => 'アンパンマンの一味',
        //     'user_id' => 1,
        //     'price' => 100,
        //     'num' => '1',
        // ]);

        // Comment::create([
        //     'cook_id' => 1,
        //     'user_id' => 1,
        //     'content' => 'まじ卍',
        // ]);

        for ($i = 0; $i <= 250; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('testtest'),
                'icon' => substr($user_icons[mt_rand(1, count($user_icons) - 1)], 17),
                'description' => $faker->text,
                'address' => $faker->address,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
            ]);
        }
    }
}
