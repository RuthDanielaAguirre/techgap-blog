<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(rand(5, 10));
        $publishedDaysAgo = rand(1, 60);
        
        return [
            'user_id' => User::whereHas('role', function ($query) {
                $query->whereIn('name', ['admin', 'writer']);
            })->inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title) . '-' . Str::random(6),
            'excerpt' => fake()->paragraph(3),
            'content' => $this->generateContent(),
            'status' => fake()->randomElement(['published', 'published', 'published', 'draft']),
            'is_featured' => fake()->boolean(15),
            'published_at' => now()->subDays($publishedDaysAgo),
            'reading_time' => rand(3, 20) . ' min',
            'views_count' => rand(0, 1500),
            'likes_count' => rand(0, 150),
            'comments_count' => rand(0, 30),
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => now()->subDays(rand(1, 30)),
        ]);
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
            'status' => 'published',
        ]);
    }

    private function generateContent(): string
    {
        $sections = rand(3, 6);
        $content = "# " . fake()->sentence() . "\n\n";
        
        for ($i = 0; $i < $sections; $i++) {
            $content .= "## " . fake()->sentence() . "\n\n";
            $content .= fake()->paragraphs(rand(2, 4), true) . "\n\n";
            
            if (fake()->boolean(40)) {
                $content .= "```php\n";
                $content .= "// Ejemplo de código\n";
                $content .= "class Example {\n";
                $content .= "    public function method() {\n";
                $content .= "        return 'Hello World';\n";
                $content .= "    }\n";
                $content .= "}\n";
                $content .= "```\n\n";
            }
        }
        
        return $content;
    }
}
