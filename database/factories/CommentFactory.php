<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::published()->inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'parent_id' => null,
            'content' => fake()->paragraph(rand(1, 3)),
            'is_approved' => true,
        ];
    }

    public function reply(): static
    {
        return $this->state(function (array $attributes) {
            $parentComment = \App\Models\Comment::whereNull('parent_id')
                ->inRandomOrder()
                ->first();
                
            return [
                'parent_id' => $parentComment?->id,
                'post_id' => $parentComment?->post_id ?? Post::published()->inRandomOrder()->first()->id,
            ];
        });
    }
}
