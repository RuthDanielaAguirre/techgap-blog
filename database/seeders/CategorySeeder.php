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
                'name' => 'Lenguaje del Código',
                'slug' => 'lenguaje-del-codigo',
                'description' => 'Etimología, significado y origen de los términos que usamos al programar.',
                'icon' => '📘',
                'color' => '#3b82f6',
                'order' => 1,
            ],
            [
                'name' => 'Cultura Git & Colaboración',
                'slug' => 'cultura-git-colaboracion',
                'description' => 'Jerga, flujos de trabajo y expresiones del mundo Git y trabajo en equipo.',
                'icon' => '🌱',
                'color' => '#22c55e',
                'order' => 2,
            ],
            [
                'name' => 'Arquitectura & Metáforas Técnicas',
                'slug' => 'arquitectura-metaforas-tecnicas',
                'description' => 'Conceptos abstractos explicados con metáforas y lenguaje cotidiano.',
                'icon' => '🏗️',
                'color' => '#f59e0b',
                'order' => 3,
            ],
            [
                'name' => 'Infraestructura & Contenedores',
                'slug' => 'infraestructura-contenedores',
                'description' => 'El lenguaje detrás de Docker, redes, servicios y despliegues.',
                'icon' => '📦',
                'color' => '#06b6d4',
                'order' => 4,
            ],
            [
                'name' => 'IA & Automatización',
                'slug' => 'ia-automatizacion',
                'description' => 'Tokens, prompts, modelos y cómo hablamos con máquinas.',
                'icon' => '🤖',
                'color' => '#8b5cf6',
                'order' => 5,
            ],
            [
                'name' => 'Lenguaje de Frameworks',
                'slug' => 'lenguaje-frameworks',
                'description' => 'Laravel, Flutter, Next.js y el vocabulario que los rodea.',
                'icon' => '🧩',
                'color' => '#ec4899',
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
