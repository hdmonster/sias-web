<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\AcademicYearSeeder;
use Database\Seeders\AcademicClassSeeder;
use Database\Seeders\ClassHomeTeacherSeeder;
use Database\Seeders\AcademicClassYearSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(3)->create();
        Student::factory(3)->create();
        Teacher::factory(3)->create();

        $this->call([
            SubjectSeeder::class,
            AcademicClassSeeder::class,
            AcademicYearSeeder::class,
            AcademicClassYearSeeder::class,
            ClassHomeTeacherSeeder::class
        ]);
    }
}
