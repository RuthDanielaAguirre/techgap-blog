<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $categories = Category::all();

        $posts = [
            [
                'title' => 'La brecha lingüística en la tecnología',
                'content' => 'El desarrollo de tecnología multilingüe presenta desafíos únicos. La mayoría de herramientas están diseñadas en inglés, creando una brecha entre usuarios de diferentes idiomas.',
                'category_id' => $categories->random()->id,
            ],
            [
                'title' => 'NLP: El futuro de la comunicación',
                'content' => 'El procesamiento del lenguaje natural está revolucionando cómo interactuamos con las máquinas. Los modelos modernos pueden entender contexto y matices lingüísticos.',
                'category_id' => $categories->random()->id,
            ],
            [
                'title' => 'Laravel y el desarrollo moderno',
                'content' => 'Laravel ofrece una arquitectura MVC robusta que facilita el desarrollo de aplicaciones web escalables. Su ecosistema incluye herramientas como Filament para paneles administrativos.',
                'category_id' => $categories->random()->id,
            ],
        ];

        foreach ($posts as $postData) {
            Post::create([
                'user_id' => $user->id,
                'category_id' => $postData['category_id'],
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'excerpt' => Str::limit($postData['content'], 100),
                'content' => $postData['content'],
                'published_at' => now(),
            ]);
        }
    }
}