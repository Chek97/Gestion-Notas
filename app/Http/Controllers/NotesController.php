<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validateCourse(Request $request){
        $course = $request->course;
        $period = $request->period;

        $processes = array();

        $students = Student::where('course_id', $course)->get();/* buscar correctamente por curso_id */
        foreach($students as $student){
            $studentProcess = Process::where('student_id', $student->id)->where('period_id', $period)->get();
            foreach($studentProcess as $stu){
                array_push($processes, ['name' =>$stu->name, 'note' => $stu->note, 'student' => $stu->student_id, 'period' => $period]);
            }
        }
        return view('courses.courses_students', compact('course', 'period', 'students', 'processes'));
    }
}
