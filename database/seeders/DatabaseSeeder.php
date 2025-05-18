<?php

namespace Database\Seeders;

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

       User::create([
        'name' => 'user',
        'email' => 'user@user.com',
        'password' => 'user123', // pas de bcrypt si 'hashed' est activé dans le modèle
    ]);
    Admin::create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => 'admin123', // pas de bcrypt si 'hashed' est activé dans le modèle
    ]);
    }
}
