<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        User::create([
        'name' => 'user',
        'email' => 'user@user.com',
        'password' => 'user123', // pas de bcrypt si 'hashed' est activé dans le modèle
]);
    }
}
