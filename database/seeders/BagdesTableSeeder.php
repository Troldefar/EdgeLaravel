<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bagdes;

class BagdesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bagdes::truncate();
        $faker = \Faker\Factory::create();
        // Loop
        for ($i = 0; $i < 50; $i++) {
            Bagdes::create([
                'title' => $faker->sentence,
                'body' => $faker->paragraph,
                'description' => $faker->sentence,
                'level' => $i
            ]);
        }
    }
}
