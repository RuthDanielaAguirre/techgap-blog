<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::published()->get();

        foreach ($posts as $post) {
            // 0-5 comentarios por post
            $commentsCount = rand(0, 5);
            
            for ($i = 0; $i < $commentsCount; $i++) {
                $comment = Comment::factory()->create([
                    'post_id' => $post->id,
                ]);

                // 30% de probabilidad de tener una respuesta
                if (rand(1, 100) <= 30) {
                    Comment::factory()->create([
                        'post_id' => $post->id,
                        'parent_id' => $comment->id,
                    ]);
                }
            }
        }
    }
}
