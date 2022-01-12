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
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentSubjectController;

Route::get('/', function () {
    return redirect("/book");
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('user', UserController::class);
    Route::resource('book', BookController::class);
});

require __DIR__ . '/web-api.php';
require __DIR__ . '/auth.php';
