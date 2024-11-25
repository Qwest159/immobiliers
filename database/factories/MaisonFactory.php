<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maison>
 */
class MaisonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'price' => (string) fake()->numberBetween(500, 5000),
            'address' => fake()->address(),
            'number_of_rooms' => (string) fake()->numberBetween(1, 10),
            'size' => (string) fake()->numberBetween(20, 500),
            'description' => fake()->paragraph(),
            'img_path' => function () {
                $randomName = Str::uuid();
                $imageUrl = "https://picsum.photos/1024/768.webp?random={$randomName}";
                $path = "images/{$randomName}.webp";
                Storage::disk('public')->put($path, file_get_contents($imageUrl));
                return $path;
            },
            'user_id' => User::get()->random()->id,
        ];
    }
}
