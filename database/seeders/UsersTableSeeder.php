<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $faker = \Faker\Factory::create();

        /** 
         * TEST ADMIN USER
         */
        User::create([
            'name' => 'Admin',
            'email' => 'r_emil@live.dk',
            'password' => Hash::make('l0ll0l')
        ]);

        /** 
         * TEST SEEDER USERS
         */
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('edgetest')
            ]);
        }
    }
}
