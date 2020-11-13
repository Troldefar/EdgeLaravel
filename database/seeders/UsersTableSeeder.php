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
        //
        User::truncate();
        // Faker
        $faker = \Faker\Factory::create();
        // Test password
        $password = Hash::make('edgetest');
        // Users
        User::create([
            'name' => 'Admin',
            'email' => 'r_emil@live.dk',
            'password' => $password
        ]);
        // Test regular users
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password
            ]);
        }
    }
}
