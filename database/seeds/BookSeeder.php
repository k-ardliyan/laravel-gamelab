<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            DB::table('books')->insert([
                'cover_image' => $faker->imageUrl(480, 640, 'cats'),
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'isbn' => $faker->isbn10(),
                'condition' => $faker->randomElement(['New','Second']),
            ]);
        }
    }
}
