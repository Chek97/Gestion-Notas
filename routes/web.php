<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\StudentsController;
use App\Models\Course;
use App\Models\Period;
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

Route::resource('notes/main', NotesController::class);
//Route::get('notes/main/{course}/{period}', [NotesController::class, 'index'])->name('notes.index');