<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

<<<<<<< HEAD
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
=======
        User::create([
        'name' => 'user',
        'email' => 'user@user.com',
        'password' => 'user123',
        'password' => Hash::make('user123'),
        ]);
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123',
            'password' => Hash::make('admin123'),
        ]);
>>>>>>> d4f92da3a43c02682860c50480ebdf7579b1e7e6
    }
}
