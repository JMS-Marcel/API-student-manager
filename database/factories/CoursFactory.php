<?php

namespace Database\Factories;

use App\Models\Cours;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cours>
 */
class CoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $cours = Cours::class;

    public function definition(): array
    {
        return [
            'nom'=> $this->faker->sentence(3),
            'description'=> $this->faker->paragraph,
            'teacher_id'=> Teacher::factory()
        ];
    }
}
