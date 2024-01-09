<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Family;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $family = Family::factory()->create([
            'name' => 'Jankowski Family',
        ]);

        User::factory()->parent()->create([
            'name' => 'Paul Jankowski',
            'family_id' => $family->id,
            'email' => 'PJankowski25@gmail.com',
        ]);

        User::factory()->child()->create([
            'name' => 'Payton Jankowski',
            'family_id' => $family->id,
            'email' => null,
            'password' => null,
        ]);
    }
}
