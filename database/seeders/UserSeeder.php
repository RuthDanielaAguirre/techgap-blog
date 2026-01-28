<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin TechGap',
            'email' => 'admin@techgap.com',
            'password' => Hash::make('Admin123!'),
            'role_id' => 1, // admin
            'bio' => 'Administrador principal del blog TechGap',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Writer
        User::create([
            'name' => 'Carlos Méndez',
            'email' => 'carlos@techgap.com',
            'password' => Hash::make('Writer123!'),
            'role_id' => 2, // writer
            'bio' => 'Desarrollador full-stack apasionado por compartir conocimiento',
            'website' => 'https://carlosmendez.dev',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Laura Torres',
            'email' => 'laura@techgap.com',
            'password' => Hash::make('Writer123!'),
            'role_id' => 2, // writer
            'bio' => 'Experta en DevOps y arquitectura cloud',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Subscribers
        User::factory()->count(10)->create();
    }
}
