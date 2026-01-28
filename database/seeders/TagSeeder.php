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
            // Frontend
            ['name' => 'React', 'color' => '#61dafb'],
            ['name' => 'Vue.js', 'color' => '#42b883'],
            ['name' => 'Angular', 'color' => '#dd0031'],
            ['name' => 'TailwindCSS', 'color' => '#06b6d4'],
            ['name' => 'TypeScript', 'color' => '#3178c6'],
            
            // Backend
            ['name' => 'Laravel', 'color' => '#ff2d20'],
            ['name' => 'Node.js', 'color' => '#339933'],
            ['name' => 'Python', 'color' => '#3776ab'],
            ['name' => 'PHP', 'color' => '#777bb4'],
            ['name' => 'Django', 'color' => '#092e20'],
            
            // Databases
            ['name' => 'MySQL', 'color' => '#4479a1'],
            ['name' => 'PostgreSQL', 'color' => '#336791'],
            ['name' => 'MongoDB', 'color' => '#47a248'],
            ['name' => 'Redis', 'color' => '#dc382d'],
            
            // DevOps
            ['name' => 'Docker', 'color' => '#2496ed'],
            ['name' => 'Kubernetes', 'color' => '#326ce5'],
            ['name' => 'GitHub Actions', 'color' => '#2088ff'],
            ['name' => 'AWS', 'color' => '#ff9900'],
            
            // AI/ML
            ['name' => 'Machine Learning', 'color' => '#ff6f00'],
            ['name' => 'TensorFlow', 'color' => '#ff6f00'],
            ['name' => 'PyTorch', 'color' => '#ee4c2c'],
            ['name' => 'OpenAI', 'color' => '#412991'],
            
            // General
            ['name' => 'Tutorial', 'color' => '#10b981'],
            ['name' => 'Buenas Prácticas', 'color' => '#8b5cf6'],
            ['name' => 'Arquitectura', 'color' => '#f59e0b'],
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
