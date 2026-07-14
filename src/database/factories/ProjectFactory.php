<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            //
            'name' => fake()->sentence(4),
            'description' => fake()->text(50),
            'source_language_id' => Language::query()
                ->inRandomOrder()
                ->first()
                ->id,
            'target_language_ids' => json_encode([2, 3, 4]),
            'use_machine_translate' => fake()->boolean(),
        ];
    }
}
