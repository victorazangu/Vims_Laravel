<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




//auth route
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store']);

Route::middleware('auth')->group(function () {

    //auth routes
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


    // dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // admin routes
    Route::get('/admins', [AdminController::class, 'index'])->name('admins');
    Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('admin_show');
    Route::get('/admins/edit/{admin}', [AdminController::class, 'edit'])->name('admin_edit');
    Route::put('/admins/update/{admin}', [AdminController::class, 'update'])->name('admin_update');
    Route::delete('/admins/delete/{admin}', [AdminController::class, 'destroy'])->name('admin_delete');


    // students routes
    Route::get('/students', [StudentController::class, 'index'])->name('students');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students_create');
    Route::post('/students', [StudentController::class, 'store'])->name('students_store');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('student_show');
    Route::get('/students/edit/{student}', [StudentController::class, 'edit'])->name('student_edit');
    Route::put('/students/update/{student}', [StudentController::class, 'update'])->name('student_update');
    Route::delete('/students/delete/{student}', [StudentController::class, 'destroy'])->name('student_delete');


    // blogs routes
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs_create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs_store');
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog_show');
    Route::get('/blogs/edit/{blog}', [BlogController::class, 'edit'])->name('blog_edit');
    Route::put('/blogs/update/{blog}', [BlogController::class, 'update'])->name('blog_update');
    Route::delete('/blogs/delete/{blog}', [BlogController::class, 'destroy'])->name('blog_delete');

    //categories routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories_create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories_store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('category_show');
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('category_edit');
    Route::put('/categories/update/{category}', [CategoryController::class, 'update'])->name('category_update');
    Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('category_delete');

    //lecturers routes
    Route::get('/lecturers', [LecturerController::class, 'index'])->name('lecturers');
    Route::get('/lecturers/{lecturer}', [LecturerController::class, 'show'])->name('lecturer_show');
    Route::get('/lecturers/edit/{lecturer}', [LecturerController::class, 'edit'])->name('lecturer_edit');
    Route::put('/lecturers/update/{lecturer}', [LecturerController::class, 'update'])->name('lecturer_update');
    Route::delete('/lecturers/delete/{lecturer}', [LecturerController::class, 'destroy'])->name('lecturer_delete');

    //library routes
    Route::get('/library', [LibraryController::class, 'index'])->name('library');
    Route::get('/library/{library}', [LibraryController::class, 'show'])->name('library_show');
    Route::get('/library/edit/{library}', [LibraryController::class, 'edit'])->name('library_edit');
    Route::put('/library/update/{library}', [LibraryController::class, 'update'])->name('library_update');
    Route::delete('/library/delete/{library}', [LibraryController::class, 'destroy'])->name('library_delete');

    //courses routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('course_show');
    Route::get('/courses/edit/{course}', [CourseController::class, 'edit'])->name('course_edit');
    Route::put('/courses/update/{course}', [CourseController::class, 'update'])->name('course_update');
    Route::delete('/courses/delete/{course}', [CourseController::class, 'destroy'])->name('course_delete');

    //classes routes
    Route::get('/classes', [SchoolClassController::class, 'index'])->name('classes');
    Route::get('/classes/{class}', [SchoolClassController::class, 'show'])->name('class_show');
    Route::get('/classes/edit/{class}', [SchoolClassController::class, 'edit'])->name('class_edit');
    Route::put('/classes/update/{class}', [SchoolClassController::class, 'update'])->name('class_update');
    Route::delete('/classes/delete/{class}', [SchoolClassController::class, 'destroy'])->name('class_delete');

    //programs routes
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs');
    Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('program_show');
    Route::get('/programs/edit/{program}', [ProgramController::class, 'edit'])->name('program_edit');
    Route::put('/programs/update/{program}', [ProgramController::class, 'update'])->name('program_update');
    Route::delete('/programs/delete/{program}', [ProgramController::class, 'destroy'])->name('program_delete');
});
