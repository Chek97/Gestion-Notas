<?php

namespace App\Http\Controllers;

use App\Charts\barraChart;
use App\Models\Behavior;
use App\Models\Course;
use App\Models\Note;
use App\Models\Period;
use App\Models\Process;
use App\Models\Student;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ReportsController extends Controller
{
    
    public function store(Request $request){// ? No usar nombres de metodos validate
        $course = $request->query('course');
        $period = $request->query('period');

        $students = Student::where('course_id', $course)->get(); // estudiantes

        return view('reports.reports_list', compact(['students', 'course', 'period']));
    }

    public function show($id, $course, $period){
        $student = Student::findOrFail($id);// estudiante
        $processes = Process::where('student_id', $id)->where('period_id', $period)->get();// procesos del estudiante en el curso y periodo actual
        $behaviors = Behavior::where('student_id', $id)->get();
        $courseName = Course::findOrFail($course);
        $periodName = Period::findOrFail($period);
        $notes = array();

        foreach ($processes as $process) {
            $processNotes = Note::where('process_id', $process->id)->get();
            if(!isEmpty($processNotes)){
                array_push($notes, ['id' => $processNotes->id, 'title' => $processNotes->title, 'calification' => $processNotes->calification, 'process_id' => $processNotes->process_id]);
            }
        }


        //Barras charts
        $bar = new barraChart();
        $bar->labels([$processes[0]->name, $processes[1]->name, $processes[2]->name, $processes[3]->name, $processes[4]->name]);
        $bar->dataset("Rendimiento", 'bar', [$processes[0]->note, $processes[1]->note, $processes[2]->note, $processes[3]->note, $processes[4]->note])->options([
            'backgroundColor' => [$processes[0]->note < 3 ? '#ff0000' : '#0000ff', $processes[1]->note < 3 ? '#ff0000' : '#0000ff', $processes[2]->note < 3 ? '#ff0000' : '#0000ff', $processes[3]->note < 3 ? '#ff0000' : '#0000ff', $processes[4]->note < 3 ? '#ff0000' : '#0000ff'],
        ]);

        return view('reports.reports_student', compact(['student', 'processes', 'behaviors', 'courseName', 
            'periodName', 'notes', 'bar']));// todo: crear index de notas de array
    }
}
