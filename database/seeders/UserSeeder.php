<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin principal
        User::factory()->admin()->create([
            'name' => 'TechGap Admin',
            'email' => 'admin@techgap.com',
            'password' => Hash::make('Admin123!'),
            'username' => 'techgap-admin',
            'bio' => 'Administrador del proyecto TechGap. Amante del lenguaje técnico y la etimología del código.',
            'website' => 'https://techgap.com',
            'avatar' => null,
        ]);

        // Escritores
        User::factory()->writer()->count(2)->create();

        // Suscriptores
        User::factory()->subscriber()->count(5)->create();
    }
}
