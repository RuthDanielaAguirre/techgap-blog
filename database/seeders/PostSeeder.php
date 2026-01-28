<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $writers = User::whereHas('role', function ($query) {
            $query->whereIn('name', ['admin', 'writer']);
        })->get();

        $categories = Category::all();
        $tags = Tag::all();

        // Posts destacados con contenido real
        $featuredPosts = [
            [
                'title' => 'Guía completa de Laravel 11: Novedades y mejores prácticas',
                'category_id' => 1,
                'content' => $this->getLaravelContent(),
                'excerpt' => 'Descubre las últimas novedades de Laravel 11 y cómo aprovecharlas en tus proyectos.',
                'tags' => ['Laravel', 'PHP', 'Tutorial'],
                'is_featured' => true,
            ],
            [
                'title' => 'Introducción práctica a Machine Learning con Python',
                'category_id' => 2,
                'content' => $this->getMLContent(),
                'excerpt' => 'Aprende los fundamentos del Machine Learning y crea tu primer modelo predictivo.',
                'tags' => ['Python', 'Machine Learning', 'Tutorial'],
                'is_featured' => true,
            ],
            [
                'title' => 'Docker y Kubernetes: De desarrollo a producción',
                'category_id' => 3,
                'content' => $this->getDockerContent(),
                'excerpt' => 'Domina la containerización y orquestación de aplicaciones modernas.',
                'tags' => ['Docker', 'Kubernetes', 'DevOps'],
                'is_featured' => true,
            ],
        ];

        foreach ($featuredPosts as $postData) {
            $post = Post::create([
                'user_id' => $writers->random()->id,
                'category_id' => $postData['category_id'],
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'excerpt' => $postData['excerpt'],
                'content' => $postData['content'],
                'status' => 'published',
                'is_featured' => $postData['is_featured'],
                'published_at' => now()->subDays(rand(1, 30)),
                'reading_time' => rand(5, 15) . ' min',
                'views_count' => rand(100, 1000),
                'likes_count' => rand(10, 100),
                'comments_count' => rand(0, 20),
            ]);

            // Asociar tags
            $tagIds = Tag::whereIn('name', $postData['tags'])->pluck('id');
            $post->tags()->attach($tagIds);
        }

        // Crear 20 posts más usando factory
        Post::factory()
            ->count(20)
            ->create()
            ->each(function ($post) use ($tags) {
                // Asociar 2-4 tags aleatorios
                $post->tags()->attach(
                    $tags->random(rand(2, 4))->pluck('id')
                );
            });
    }

    private function getLaravelContent(): string 
    {
        return "Laravel";
    }

    private function getMLContent(): string 
    {
        return "Machine Learning";
    }

    private function getDockerContent(): string 
    {
        return "Docker";
    }
}