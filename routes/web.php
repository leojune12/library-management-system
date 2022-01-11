<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\YearLevelController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\StudentSubjectController;

Route::get('/', function () {
    return redirect("/students");
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('schools', SchoolController::class);
    Route::resource('academic-years', AcademicYearController::class);
    Route::resource('semesters', SemesterController::class);
    Route::resource('year-levels', YearLevelController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('students', StudentController::class);
    Route::get('students/subjects/{id}', [StudentController::class, 'editStudentSubject']);
    Route::put('students/subjects/{id}', [StudentController::class, 'updateStudentSubject']);
    Route::resource('summary', SummaryController::class);

    Route::resource('user', UserController::class);
});

require __DIR__ . '/web-api.php';
require __DIR__ . '/auth.php';
