<?php

namespace Database\Seeders;

use App\Models\System;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Msimamizi wa Uchaguzi',
            'username' => 'admin',
            'email' => 'admin@morogorotc.ac.tz',
        ]);

        System::factory()->create([
            'id' => 1,
            'start' => now(),
            'end' => now()
        ]);
    }
}
