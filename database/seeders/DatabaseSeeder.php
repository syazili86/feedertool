<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProfilPT;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'admin',
            'username' => 'username',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(30)->create();
        ProfilPT::factory(10)->create();
    }
}
