<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


//Student
Route::controller(StudentController::class)->group(function(){
    Route::get('student', 'index');
    Route::post('student', 'store');
    Route::put('student/update/{id}', 'update');
    Route::delete('student/delete/{id}', 'destroy');
})->name('student');


//Teacher
Route::controller(TeacherController::class)->group(function(){
  Route::get('teacher', 'index');
  Route::post('teacher', 'store');
  Route::put('teacher/update/{id}', 'update');
  Route::delete('teacher/delete/{id}', 'destroy');
})->name('teacher');

//Admnin
Route::controller(AdminController::class)->group(function(){
  Route::get('admin', 'index');
  Route::post('admin', 'store');
  Route::put('admin/update/{admin}', 'update');
  Route::delete('admin/delete/{admin}', 'destroy');
})->name('admin');


//Cours
Route::controller(CoursController::class)->group(function(){
  Route::get('cours', 'index');
  Route::post('cours', 'store');
  Route::put('cours/update/{id}', 'update');
  Route::delete('cours/delete/{id}', 'destroy');
})->name('cours');


//Note
Route::controller(NoteController::class)->group(function(){
  Route::get('note', 'index');
  Route::post('note', 'store');
  Route::put('note/update/{id}', 'update');
  Route::delete('note/delete/{id}', 'destroy');
})->name('note');
