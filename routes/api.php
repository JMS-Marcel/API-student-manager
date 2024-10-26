<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


//Admin
Route::apiResource('admin', AdminController::class);

//Teacher
Route::apiResource('teacher', TeacherController::class);

//Student
Route::apiResource('student', StudentController::class);

//Cours
Route::apiResource('cours', CoursController::class);

//Note
Route::apiResource('note', NoteController::class);





