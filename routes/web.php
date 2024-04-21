<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

Route::get('/', function () {
    return view('welcome');
});

Route::get('navbar', function () {
    return view('navbar');
});

Route::get('home', [AuthManager::class, 'index'])->name('home');
Route::post('home', [AuthManager::class, 'postkomentar'])->middleware('auth');
Route::delete('/comments/{comment}', [AuthManager::class, 'destroy']);

Route::get('project', function () {
    return view('project');
});
Route::get('/edit', [AuthManager::class, 'edit'])->middleware('auth')->name('edit');
Route::post('/edit', [AuthManager::class, 'updateProfile'])->middleware('auth')->name('updateProfile');

// Route::post('/edit', [AuthManager::class, 'editPost'])->name('edit.post');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
