<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear un usuario administrador
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@techgap.com',
            'password' => Hash::make('admin123'),
            'is_admin' => true, 
            'account_type' => 'writer',
            'writer_status' => 'approved',
        ]);

        // Crear un usuario de prueba (no admin)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'account_type' => 'subscriber',
            'writer_status' => 'none',
        ]);

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
