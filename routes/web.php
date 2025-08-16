<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('professors', ProfessorController::class);
