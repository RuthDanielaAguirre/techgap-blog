<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Jerga Tech', 'color' => '#0ea5e9'],
            ['name' => 'Etimología', 'color' => '#6366f1'],
            ['name' => 'Metáforas', 'color' => '#f59e0b'],
            ['name' => 'Cultura Dev', 'color' => '#10b981'],
            ['name' => 'Git', 'color' => '#ef4444'],
            ['name' => 'Branching', 'color' => '#f97316'],
            ['name' => 'Pull Request', 'color' => '#3b82f6'],
            ['name' => 'Laravel', 'color' => '#ff2d20'],
            ['name' => 'Docker', 'color' => '#06b6d4'],
            ['name' => 'Redes', 'color' => '#0ea5e9'],
            ['name' => 'IA', 'color' => '#8b5cf6'],
            ['name' => 'Tokens', 'color' => '#a855f7'],
            ['name' => 'Prompting', 'color' => '#ec4899'],
            ['name' => 'Onboarding Junior', 'color' => '#22c55e'],
            ['name' => 'Vocabulario Dev', 'color' => '#14b8a6'],
            ['name' => 'Inglés Técnico', 'color' => '#3b82f6'],
            ['name' => 'Framework Thinking', 'color' => '#f43f5e'],
            ['name' => 'Colaboración', 'color' => '#10b981'],
            ['name' => 'Arquitectura Mental', 'color' => '#f59e0b'],
            ['name' => 'Flutter', 'color' => '#38bdf8'],
            ['name' => 'Widgets', 'color' => '#0ea5e9'],
            ['name' => 'Conceptos Clave', 'color' => '#6366f1'],
            ['name' => 'Buzzwords', 'color' => '#f97316'],
            ['name' => 'Historia de Términos', 'color' => '#8b5cf6'],
        ];

        foreach ($tags as $tag) {
            DB::table('tags')->insert([
                'name' => $tag['name'],
                'slug' => Str::slug($tag['name']),
                'color' => $tag['color'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
