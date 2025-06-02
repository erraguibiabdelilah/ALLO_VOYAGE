<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Voyage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        // Create default users
        User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon@gmail.com',
            'password' => Hash::make('jhon123'),
        ]);

        User::factory(10)->create();

        // Create default admin
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        // Ajout de nouveaux voyages au Maroc
        Voyage::create([
            'destination' => 'Rabat',
            'date_depart' => '2025-06-02',
            'date_retour' => '2025-06-02',
            'prix' => 80.00,
            'places_disponibles' => 45,
            'description' => 'Découvrez la capitale administrative du Maroc',
            'lieu_depart' => 'Casablanca',
            'heure_depart' => '09:00',
            'heure_arrivee' => '10:30',
            'nbr_arret' => 1
        ]);

        Voyage::create([
            'destination' => 'Rabat',
            'date_depart' => '2025-06-02',
            'date_retour' => '2025-06-02',
            'prix' => 80.00,
            'places_disponibles' => 45,
            'description' => 'Découvrez la capitale administrative du Maroc',
            'lieu_depart' => 'Casablanca',
            'heure_depart' => '12:00',
            'heure_arrivee' => '13:30',
            'nbr_arret' => 1
        ]);

        Voyage::create([
            'destination' => 'Rabat',
            'date_depart' => '2025-06-02',
            'date_retour' => '2025-06-02',
            'prix' => 80.00,
            'places_disponibles' => 45,
            'description' => 'Découvrez la capitale administrative du Maroc',
            'lieu_depart' => 'Casablanca',
            'heure_depart' => '15:00',
            'heure_arrivee' => '16:30',
            'nbr_arret' => 1
        ]);

        Voyage::create([
            'destination' => 'Fès',
            'date_depart' => '2025-06-03',
            'date_retour' => '2025-06-03',
            'prix' => 120.00,
            'places_disponibles' => 35,
            'description' => 'Explorez la plus ancienne médina du Maroc',
            'lieu_depart' => 'Rabat',
            'heure_depart' => '08:30',
            'heure_arrivee' => '13:30',
            'nbr_arret' => 2
        ]);

        Voyage::create([
            'destination' => 'Marrakech',
            'date_depart' => '2025-06-04',
            'date_retour' => '2025-06-04',
            'prix' => 180.00,
            'places_disponibles' => 40,
            'description' => 'Visitez la ville ocre et ses souks',
            'lieu_depart' => 'Agadir',
            'heure_depart' => '07:00',
            'heure_arrivee' => '14:30',
            'nbr_arret' => 3
        ]);

        Voyage::create([
            'destination' => 'Casablanca',
            'date_depart' => '2025-06-05',
            'date_retour' => '2025-06-05',
            'prix' => 160.00,
            'places_disponibles' => 50,
            'description' => 'Découvrez la capitale économique',
            'lieu_depart' => 'Fès',
            'heure_depart' => '08:00',
            'heure_arrivee' => '14:00',
            'nbr_arret' => 2
        ]);

        Voyage::create([
            'destination' => 'Agadir',
            'date_depart' => '2025-06-06',
            'date_retour' => '2025-06-06',
            'prix' => 200.00,
            'places_disponibles' => 38,
            'description' => 'Profitez des plages de la ville du soleil',
            'lieu_depart' => 'Fès',
            'heure_depart' => '06:30',
            'heure_arrivee' => '15:30',
            'nbr_arret' => 3
        ]);

        Voyage::create([
            'destination' => 'Casablanca',
            'date_depart' => '2025-06-07',
            'date_retour' => '2025-06-07',
            'prix' => 150.00,
            'places_disponibles' => 45,
            'description' => 'Voyage direct vers la capitale économique',
            'lieu_depart' => 'Marrakech',
            'heure_depart' => '07:30',
            'heure_arrivee' => '12:30',
            'nbr_arret' => 1
        ]);

        Voyage::create([
            'destination' => 'Agadir',
            'date_depart' => '2025-06-08',
            'date_retour' => '2025-06-08',
            'prix' => 130.00,
            'places_disponibles' => 42,
            'description' => 'Direction la ville balnéaire',
            'lieu_depart' => 'Marrakech',
            'heure_depart' => '09:00',
            'heure_arrivee' => '13:30',
            'nbr_arret' => 1
        ]);
    }
}
