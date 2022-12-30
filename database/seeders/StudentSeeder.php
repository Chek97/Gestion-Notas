<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = Course::all();

        for ($i=1 ; $i <= count($courses); $i++) {
            for($j = 1; $j <= 35; $j++){
                Student::create(['name' => 'student ' . $j, 'last_name' => 'last ' . $j, 'course_id' => $i]);
            } 
        }
    }
}
