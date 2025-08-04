<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EscuelaController;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', [EscuelaController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // curso a estudiantes
    Route::resource('students', StudentController::class);
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{id}/assign-courses', [StudentController::class, 'createCoursesByStudentForm'])->name('students.assign.form');
    Route::post('/students/{id}/assign-courses', [StudentController::class, 'createCoursesByStudent'])->name('students.assign');
    Route::get('/students/{id}/courses', [StudentController::class, 'showAssignedCourses'])->name('students.courses'); //cursos asignados a estudiante
    // estudiante a cursos
    Route::resource('courses', CourseController::class);
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{id}/assign-students', [CourseController::class, 'createStudentsByCourseForm'])->name('courses.assign.form');
    Route::post('/courses/{id}/assign-students', [CourseController::class, 'createStudentsByCourse'])->name('courses.assign');
    Route::get('/courses/{id}/students', [CourseController::class, 'showAssignedStudents'])->name('courses.students'); //estudiantes asignados a un curso
    Route::resource('escuela', EscuelaController::class);
   // Route::redirect('/dashboard', '/escuela')->middleware(['auth', 'verified']);

});

require __DIR__.'/auth.php';
