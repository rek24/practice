<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('students', [App\Http\Controllers\StudentsController::class, 'index']);
    Route::post('students', [App\Http\Controllers\StudentsController::class, 'index']);
    Route::get('students', [\App\Http\Controllers\StudentsController::class, 'index'])->name('students.index');
    Route::get('students/create', [App\Http\Controllers\StudentsController::class, 'create'])->name('students.create');
    Route::post('students', [App\Http\Controllers\StudentsController::class, 'store'])->name('students.store');
    Route::get('students/{id}/edit', [App\Http\Controllers\StudentsController::class, 'edit'])->name('students.edit');
    Route::put('students/{id}/edit', [App\Http\Controllers\StudentsController::class, 'update'])->name('students.update');
    Route::get('students/{id}/delete', [App\Http\Controllers\StudentsController::class, 'destroy'])->name('students.delete');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});