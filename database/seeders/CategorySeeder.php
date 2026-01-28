<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Desarrollo Web',
                'slug' => 'desarrollo-web',
                'description' => 'Tutoriales, frameworks y mejores prácticas de desarrollo web',
                'icon' => '🌐',
                'color' => '#0ea5e9',
                'order' => 1,
            ],
            [
                'name' => 'Inteligencia Artificial',
                'slug' => 'inteligencia-artificial',
                'description' => 'Machine Learning, Deep Learning y aplicaciones de IA',
                'icon' => '🤖',
                'color' => '#8b5cf6',
                'order' => 2,
            ],
            [
                'name' => 'DevOps',
                'slug' => 'devops',
                'description' => 'CI/CD, contenedores, kubernetes y automatización',
                'icon' => '⚙️',
                'color' => '#10b981',
                'order' => 3,
            ],
            [
                'name' => 'Bases de Datos',
                'slug' => 'bases-de-datos',
                'description' => 'SQL, NoSQL, optimización y arquitectura de datos',
                'icon' => '🗄️',
                'color' => '#f59e0b',
                'order' => 4,
            ],
            [
                'name' => 'Seguridad',
                'slug' => 'seguridad',
                'description' => 'Ciberseguridad, buenas prácticas y protección de datos',
                'icon' => '🔒',
                'color' => '#ef4444',
                'order' => 5,
            ],
            [
                'name' => 'Cloud Computing',
                'slug' => 'cloud-computing',
                'description' => 'AWS, Azure, GCP y arquitecturas en la nube',
                'icon' => '☁️',
                'color' => '#06b6d4',
                'order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'description' => $category['description'],
                'icon' => $category['icon'],
                'color' => $category['color'],
                'order' => $category['order'],
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
