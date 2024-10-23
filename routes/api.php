<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;



//Student
Route::controller(StudentController::class)->group(function(){
    Route::get('student', 'index');
    Route::post('student', 'store');
    Route::put('student/update/{id}', 'update');
    Route::delete('student/delete/{id}', 'destroy');
});


//Teacher
Route::controller(TeacherController::class)->group(function(){
  Route::get('teacher', 'index');
  Route::post('teacher', 'store');
  Route::put('teacher/update/{id}', 'update');
  Route::delete('teacher/delete/{id}', 'destroy');
});

//Admnin
Route::controller(AdminController::class)->group(function(){
  Route::get('admin', 'index');
  Route::post('admin', 'store');
  Route::put('admin/update/{id}', 'update');
  Route::delete('admin/delete/{id}', 'destroy');
});


//Cours
Route::controller(CoursController::class)->group(function(){
  Route::get('cours', 'index');
  Route::post('cours', 'store');
  Route::put('cours/update/{id}', 'update');
  Route::delete('cours/delete/{id}', 'destroy');
});


//Note
Route::controller(NoteController::class)->group(function(){
  Route::get('note', 'index');
  Route::post('note', 'store');
  Route::put('note/update/{id}', 'update');
  Route::delete('note/delete/{id}', 'destroy');
});
