<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class IssuesSeeder extends Seeder
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
            DB::table('issues')->insert([
                'member_id' => $faker->numberBetween(1, 100),
                'book_id' => $faker->numberBetween(1, 100),
                'issue_date' => $faker->dateTimeBetween('-1 years', 'now'),
                'return_date' => $faker->dateTimeBetween('now', '+1 years'),
                'due_date' => 0,
                'is_booked' => $faker->boolean,
            ]);
        }
    }
}
