<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;

Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::get('/',[CourseController::class,'index']);
