<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/admins', function () {
    return view('admins.index');
})->name('admins.index');

Route::get('/blogs', function () {
    return view('blogs.index');
})->name('blogs.index');

Route::get('/classes', function () {
    return view('classes.index');
})->name('classes.index');

Route::get('/courses', function () {
    return view('courses.index');
})->name('courses.index');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::get('/lecturers', function () {
    return view('lecturers.index');
})->name('lecturers.index');

Route::get('/library', function () {
    return view('library.index');
})->name('library.index');

Route::get('/programs', function () {
    return view('programs.index');
})->name('programs.index');

Route::get('/students', function () {
    return view('students.index');
})->name('students.index');
