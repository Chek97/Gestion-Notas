<?php

namespace Database\Seeders;

use App\Models\Period;
use App\Models\Process;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();
        $periods = Period::all();

        for($i = 1; $i <= count($students); $i++){
            for ($j=1; $j <= count($periods); $j++) { 
                Process::create(['name' => 'comprension lectora', 'note' => 0.0, 'student_id' => $i, 'period_id' => $j]);
                Process::create(['name' => 'argumentacion', 'note' => 0.0, 'student_id' => $i, 'period_id' => $j]);
                Process::create(['name' => 'socio-personal', 'note' => 0.0, 'student_id' => $i, 'period_id' => $j]);
                Process::create(['name' => 'solucion de problemas', 'note' => 0.0, 'student_id' => $i, 'period_id' => $j]);
                Process::create(['name' => 'promedio', 'note' => 0.0, 'student_id' => $i, 'period_id' => $j]);
            }
        }
    }
}
