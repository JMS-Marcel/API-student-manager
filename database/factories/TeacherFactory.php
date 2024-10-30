<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $teacher = Teacher::class;
    
    public function definition(): array
    {
        return [
            'nom'=> $this->faker->firstName,
            'prenom'=> $this->faker->lastName,
            'date_naissance' => $this->faker->date(),
            'password' => bcrypt('password'),
            'phone' => $this->faker->phoneNumber,
            'email'=> $this->faker->unique()->safeEmail,
        ];
    }
}
