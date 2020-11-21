<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::truncate();
        $faker = \Faker\Factory::create();
        /** 
         * TEST TEAMS
         */
        for($i = 0; $i < 50; $i++) {
            Team::create([
                'teamname' => 'Team ' . $i,
                'description' => 'Team' . $i . ' Description'
            ]);
        }
    }
}
