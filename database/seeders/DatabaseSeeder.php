<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(StudentSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(CoursSeeder::class);
        $this->call(NoteSeeder::class);
    }
}
