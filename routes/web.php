<?php

use App\Http\Controllers\BehaviorsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\StudentsController;
use App\Models\Course;
use App\Models\Note;
use App\Models\Period;
use App\Models\Process;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('index');

Route::get('/create', function () {
    return view('create.create_main');
})->name('create-index');

Route::resource('students', StudentsController::class);

Route::get('/create/course', [CoursesController::class, 'create'])->name('course.create');
Route::post('/create/course', [CoursesController::class, 'store'])->name('course.store');

Route::get('notes', function(){
    $courses = Course::all();
    $periods = Period::all();
    return view('courses.courses_main', compact(['courses', 'periods']));
})->name('courses-index');

Route::post('notes', [NotesController::class, 'validateCourse'])->name('notes.validate');

Route::resource('notes/main', NotesController::class)->except('create', 'destroy', 'show', 'edit');
Route::get('/notes/main/{id}/{period}', function($id, $period){
    $process = Process::where('student_id', $id)->where('period_id', $period)->get();
    $student = $id;
    return view('courses.courses_note', compact(['process', 'student', 'period']));
})->name('main.create');

Route::get('/notes/main/{main}/{student}/{period}', function($main, $student, $period){
    $process = Process::findOrFail($main);
    $notes = Note::where('process_id', $main)->get();

    return view('courses.courses_process', compact(['process', 'notes', 'student', 'period']));
})->name('main.show');

Route::get('/notes/main/{main}/edit/{student}/{period}', function($main, $student, $period){
    $note = Note::findOrFail($main);
    $processes = Process::findOrFail($note->process_id);

    return view('courses.courses_edit_note', compact(['note', 'processes', 'student', 'period']));
})->name('main.edit');

Route::delete('/notes/main/{main}/{student}/{period}/{process}', [NotesController::class, 'destroy'])->name('main.destroy');
//Route::get('notes/main/{course}/{period}', [NotesController::class, 'index'])->name('notes.index');

Route::resource('/behavior', BehaviorsController::class);