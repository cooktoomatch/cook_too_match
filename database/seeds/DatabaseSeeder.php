<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Cook_CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CooksTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
