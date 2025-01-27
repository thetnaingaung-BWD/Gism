<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'GISM Super-Admin',
            'email' => 'gism@email.com',
            'password' => Hash::make('gism1234'), // Encrypt the password
            'permission' => 'Super-Admin'
        ]);
    }
}
