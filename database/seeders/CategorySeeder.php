<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tecnología', 'description' => 'Artículos sobre tecnología y desarrollo'],
            ['name' => 'Lenguaje', 'description' => 'Lingüística y comunicación'],
            ['name' => 'IA y NLP', 'description' => 'Inteligencia artificial y procesamiento del lenguaje'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}