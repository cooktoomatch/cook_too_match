<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\Cook;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cook_images = Storage::allFiles('public/cook_image');

        for ($i = 0; $i < count(Cook::all()); $i++) {
            Image::create([
                'cook_id' => $i,
                'image' => substr($cook_images[mt_rand(1, count($cook_images) - 1)], 18),
            ]);
        }

        for ($i = 0; $i < count(Cook::all()); $i++) {
            Image::create([
                'cook_id' => $i,
                'image' => substr($cook_images[mt_rand(1, count($cook_images) - 1)], 18),
            ]);
        }

        for ($i = 0; $i < count(Cook::all()); $i++) {
            Image::create([
                'cook_id' => $i,
                'image' => substr($cook_images[mt_rand(1, count($cook_images) - 1)], 18),
            ]);
        }
    }
}
