<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Ketua',
            'email' => 'ketua@example.com',
            'password' => Hash::make('password'),
            'role' => 'ketua',
        ]);

        User::factory()->create([
            'name' => 'Humas',
            'email' => 'humas@example.com',
            'password' => Hash::make('password'),
            'role' => 'humas',
        ]);
    }
}
