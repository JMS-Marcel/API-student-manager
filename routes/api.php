<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\TeacherAuthController;
use Illuminate\Http\Request;

Route::get('/user', function(Request $request){
  return $request->user();
})->middleware('auth:sanctum');

//Auth admin
Route::post('login-admin', [AuthAdminController::class, 'login']);
Route::post('logout-admin', [AuthAdminController::class, 'logout'])->middleware('auth:sanctum');

//Auth teacher
Route::post('login-teacher', [TeacherAuthController::class, 'login']);
Route::post('logout-teacher', [TeacherAuthController::class, 'logout'])->middleware('auth:sanctum');

//Auth Student
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





