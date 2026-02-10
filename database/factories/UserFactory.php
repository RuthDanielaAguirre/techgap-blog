<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'username' => $this->generateUsername($name), // ← NUEVO
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'role_id' => 3,
            'bio' => fake()->optional()->sentence(20),
            'website' => fake()->optional()->url(),
            'is_active' => true,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Genera un username único basado en el nombre
     */
    private function generateUsername(string $name): string
    {
        // Convertir a slug (sin espacios, sin acentos)
        $base = Str::slug($name);

        // Si por alguna razón queda vacío, usar algo aleatorio
        if (empty($base)) {
            $base = 'user' . fake()->unique()->numberBetween(1000, 9999);
        }

        // Asegurar unicidad
        $username = $base;
        $counter = 1;

        while (\App\Models\User::where('username', $username)->exists()) {
            $username = $base . $counter;
            $counter++;
        }

        return $username;
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role_id' => 1,
        ]);
    }

    public function writer(): static
    {
        return $this->state(fn (array $attributes) => [
            'role_id' => 2,
        ]);
    }

    public function subscriber(): static
    {
        return $this->state(fn (array $attributes) => [
            'role_id' => 3,
        ]);
    }
}
