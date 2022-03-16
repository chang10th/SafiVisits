<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'=>'usersio',
            'email'=>'visiteur01@safi.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pwsio'),
            'remember_token' => Str::random(10)
        ]);
        //\App\Models\User::factory(10)->create();
    }
}
