<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'data' => [
                [
                    'key' => fake()->word(),
                    'value' => fake()->sentence(),
                ],
                [
                    'key' => fake()->word(),
                    'value' => fake()->sentence(),
                ],
            ]
        ];
    }
}
