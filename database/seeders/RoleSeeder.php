<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Control total del sistema, gestiona usuarios, posts y configuración',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'writer',
                'display_name' => 'Escritor',
                'description' => 'Puede crear y gestionar sus propias publicaciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'subscriber',
                'display_name' => 'Suscriptor',
                'description' => 'Puede leer, comentar, dar likes y guardar posts',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']],
                $role
            );
        }
    }
}
