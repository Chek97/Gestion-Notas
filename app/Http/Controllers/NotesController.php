<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Process;
use App\Models\Student;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $note = new Note();
        $process = Process::findOrFail($request->process);
        
        $note->title = $request->title;
        $note->calification = $request->note;
        $note->process_id = $request->process;
        
        $note->save();
        $prom = 0;
        $allNotes = 0;

        if($note->isClean()){
            $processNotes = Note::where('process_id', $request->process)->get();
            if(count($processNotes) == 0){
                return to_route('index');
            }else{
                foreach ($processNotes as $prodNote) {
                    $allNotes += $prodNote->calification;
                }
                $prom = $allNotes / count($processNotes); //Promedio del proceso
                $process->note = $prom;
                $process->save();
                if($process->wasChanged()){
                    $this->calculateProcesProm($request->studentId, $request->period);
                }
            }
        }
        return to_route('index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $process = Process::findOrFail($request->process);
        $noteFlag = false;
        $allNotes = 0;
        $prom = 0;

        $note->title = $request->title;
        if($note->calification != $request->note){
            $noteFlag = true;
        }
        $note->calification = $request->note;

        $note->save();

        if($noteFlag == true){
            $processNotes = Note::where('process_id', $request->process)->get();
            if(count($processNotes) == 0){
                return to_route('index');
            }else{
                foreach ($processNotes as $prodNote) {
                    $allNotes += $prodNote->calification;
                }
                $prom = $allNotes / count($processNotes); //Promedio del proceso
                $process->note = round($prom, 2);
                $process->save();
                if($process->wasChanged()){
                    $this->calculateProcesProm($request->student_id, $request->period_id);
                }
            }
        }

        return to_route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($main, $student, $period, $process)
    {
        $note = Note::findOrFail($main);
        $process_id = Process::findOrFail($process);
        $allNotes = 0;
        $prom = 0;

        $note->delete();

        if($note->isClean()){
            $processNotes = Note::where('process_id', $process)->get();
            if(count($processNotes) == 0){
                return to_route('index');
            }else{
                foreach ($processNotes as $prodNote) {
                    $allNotes += $prodNote->calification;
                }
                $prom = $allNotes / count($processNotes); //Promedio del proceso
                $process_id->note = round($prom, 2);
                $process_id->save();
                if($process_id->wasChanged()){
                    $this->calculateProcesProm($student, $period);
                }
            }
        }

        return to_route('index');
    }

    public function validateCourse(Request $request){
        $course = $request->course;
        $period = $request->period;

        $processes = array();

        $students = Student::where('course_id', $course)->get();/* buscar correctamente por curso_id */
        foreach($students as $student){
            $studentProcess = Process::where('student_id', $student->id)->where('period_id', $period)->get();
            foreach($studentProcess as $stu){
                array_push($processes, ['id' => $stu->id, 'name' =>$stu->name, 'note' => $stu->note, 'student' => $stu->student_id, 'period' => $period]);
            }
        }
        return view('courses.courses_students', compact('course', 'period', 'students', 'processes'));
    }

    public function calculateProcesProm($student_id, $period_id){
        //$process_prom = Process::where("student_id", $student_id)->where("period_id", $period_id)->where("name", "promedio")->get();
        $process_notes = Process::where("student_id", $student_id)->where("period_id", $period_id)->where("name", "!=" ,"promedio")->get();
        $result = 0;
        foreach ($process_notes as $proNot) {
            $result += $proNot->note;
        }
        $result = round($result / 4, 2);
        Process::where("student_id", $student_id)->where("period_id", $period_id)->where("name", "promedio")->update(["note" => $result]);
    }
}
