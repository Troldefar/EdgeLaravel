<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::truncate();
        $faker = \Faker\Factory::create();
        // Loop
        for ($i = 0; $i < 50; $i++) {
            Game::create([
                'game_length' => $i,
                'victory' => $i,
                'team_one' => 'rasmus lasse martin nick trolle',
                'team_two' => 'louise bedstefar bedstemor denher wowomg',
                'statistics' => $faker->text
            ]);
        }
    }
}
