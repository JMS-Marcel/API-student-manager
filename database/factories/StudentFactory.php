<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;


    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'date_naissance' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Mot de passe crypté
            'matricule' => Str::random(10),
            'phone' => $this->faker->phoneNumber,
            'adresse' => $this->faker->address,
        ];
    }
}
