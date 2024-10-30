<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\StudentAuthController;

Route::post('login', [AuthAdminController::class, 'login']);
Route::post('logout', [AuthAdminController::class, 'logout'])->middleware('auth:sanctum');

Route::post('login-student', [StudentAuthController::class, 'login']);
Route::post('logout-student', [StudentAuthController::class, 'logout'])->middleware('auth:sanctum');


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





