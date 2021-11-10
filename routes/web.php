<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'dashboard.redirect'])->name('dashboard');

Route::group(['middleware'=>'auth'], function(){

    Route::view('/dashboard/admin', 'dashboard')
        ->name('dashboard')->middleware('admin');

    Route::view('/dashboard/teacher', 'teacher-dashboard')
    ->name('dashboard.teacher')->middleware('teacher');

    Route::view('/dashboard/student', 'student-dashboard')
    ->name('dashboard.student')->middleware('student');

    Route::view('/student', 'student')
    ->name('student')->middleware('admin');

    Route::view('/course', 'course')
    ->name('course')->middleware('admin');

    Route::view('/teacher', 'teacher')
    ->name('teacher')->middleware('admin');

    Route::view('/schedule', 'schedule')
        ->name('schedule')->middleware('admin');   
    
});


require __DIR__.'/auth.php';
