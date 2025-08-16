<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Professor;
use App\Models\Course;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create professors
        $professors = [
            ['name' => 'Dr. John Smith'],
            ['name' => 'Prof. Sarah Johnson'],
            ['name' => 'Dr. Michael Brown'],
            ['name' => 'Prof. Emily Davis'],
            ['name' => 'Dr. Robert Wilson'],
        ];

        foreach ($professors as $professorData) {
            Professor::create($professorData);
        }

        // Create courses with professors
        $courses = [
            [
                'name' => 'Introduction to Computer Science',
                'description' => 'Fundamental concepts of programming and computer science',
                'professor_id' => 1
            ],
            [
                'name' => 'Web Development',
                'description' => 'Building modern web applications using various technologies',
                'professor_id' => 2
            ],
            [
                'name' => 'Database Management',
                'description' => 'Design and management of relational databases',
                'professor_id' => 3
            ],
            [
                'name' => 'Software Engineering',
                'description' => 'Principles and practices of software development',
                'professor_id' => 4
            ],
            [
                'name' => 'Data Structures & Algorithms',
                'description' => 'Advanced programming concepts and problem solving',
                'professor_id' => 5
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }

        // Create students
        $students = [
            [
                'fname' => 'Alice',
                'lname' => 'Johnson',
                'email' => 'alice.johnson@email.com'
            ],
            [
                'fname' => 'Bob',
                'lname' => 'Williams',
                'email' => 'bob.williams@email.com'
            ],
            [
                'fname' => 'Charlie',
                'lname' => 'Brown',
                'email' => 'charlie.brown@email.com'
            ],
            [
                'fname' => 'Diana',
                'lname' => 'Miller',
                'email' => 'diana.miller@email.com'
            ],
            [
                'fname' => 'Edward',
                'lname' => 'Davis',
                'email' => 'edward.davis@email.com'
            ],
        ];

        foreach ($students as $studentData) {
            Student::create($studentData);
        }

        // Assign courses to students (many-to-many relationship)
        $students = Student::all();
        $courses = Course::all();

        // Assign random courses to each student
        foreach ($students as $student) {
            $randomCourses = $courses->random(rand(1, 3));
            $student->courses()->attach($randomCourses->pluck('id'));
        }
    }
}
