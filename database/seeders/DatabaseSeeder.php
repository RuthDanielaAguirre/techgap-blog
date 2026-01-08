<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un usuario administrador
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@techgap.com',
            'password' => \Hash::make('admin123'),
        ]);

        // Crear un usuario de prueba
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => \Hash::make('password'),
        ]);

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}