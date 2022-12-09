<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentsController;
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