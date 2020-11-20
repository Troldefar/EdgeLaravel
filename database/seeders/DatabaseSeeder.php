<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** Populate seeder by default so that no additional setup is required
         * CLI - RUN: php artisan db:seed
         *  */ 
        $this->call(BagdesTableSeeder::class);
        $this->call(USersTableSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(TeamSeeder::class);
    }
}
