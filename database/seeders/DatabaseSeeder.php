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
        // User::create([
        //     'name' => 'admin',
        //     'username' => '021019',
        //     'password' => bcrypt('pdadsti@ubd2022'),
        //     'remember_token' => Str::random(10),
        // ]);
        User::create([
            'name' => 'admin 2',
            'username' => 'admin2',
            'password' => bcrypt('admin2'),
            'remember_token' => Str::random(10),
        ]);

        // \App\Models\User::factory(30)->create();
        // ProfilPT::factory(10)->create();
    }
}
