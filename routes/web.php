<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
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
  


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// dashboard routes
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


// admin routes
Route::get('/admins',[AdminController::class,'index'])->name('admins.index');



Route::get('/blogs', function () {
    return view('blogs.index');
})->name('blogs.index');

Route::get('/classes', function () {
    return view('classes.index');
})->name('classes.index');

Route::get('/courses', function () {
    return view('courses.index');
})->name('courses.index');


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



Route::get('/admins/show', function () {
    return view('admins.show');
})->name('admins.show');

Route::get('/blogs/show', function () {
    return view('blogs.show');
})->name('blogs.show');


});