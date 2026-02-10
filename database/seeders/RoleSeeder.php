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
            ],
            [
                'name' => 'writer',
                'display_name' => 'Escritor',
                'description' => 'Puede crear y gestionar sus propias publicaciones',
            ],
            [
                'name' => 'subscriber',
                'display_name' => 'Suscriptor',
                'description' => 'Puede leer, comentar, dar likes y guardar posts',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']],
                array_merge($role, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
