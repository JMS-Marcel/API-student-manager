<?php

namespace Database\Factories;

use App\Models\Cours;
use App\Models\Note;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $note = Note::class;
     

    public function definition(): array
    {
        return [
            'valeur'=> random_int(1, 20),
            'student_id' => Student::factory(),
            'cours_id' => Cours::factory()
        ];
    }
}
