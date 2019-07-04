<?php

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
        $faker = Faker::create('ja_JP');

        User::create([
            'name' => 'kaka',
            'email' => 'kaka@gmail.com',
            'password' => Hash::make('asdfghjkl'),
            'icon' => 'https://www.crank-in.net/img/db/1324659_650.jpg',
            'description' => 'kaka',
            'address' => $faker->address,
        ]);

        User::create([
            'name' => 'aaa',
            'email' => 'a@a.com',
            'password' => Hash::make('aaaaaa'),
            'icon' => 'storage/user_icon/1409251889212522_5d1a60b069019.jpg',
            'description' => 'aaaです、こんにちは',
            'address' => $faker->address,
        ]);
      
        Cook::create([
            'name' => 'カレーパンマン',
            'description' => 'アンパンマンの一味',
            'user_id' => 1,
            'price' => 100,
            'num' => '1',
        ]);

        Comment::create([
            'cook_id' => 1,
            'user_id' => 1,
            'content' => 'まじ卍',
        ]);

        for ($i = 0; $i <= 30; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('testtest'),
                'icon' => 'https://www.crank-in.net/img/db/1324659_650.jpg',
                'description' => $faker->text,
                'address' => $faker->address,
            ]);
        }
    }
}
