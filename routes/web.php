<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\StopController;
use App\Http\Controllers\ShortestPathController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\RoutestopController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Shortest path routes
Route::get('/shortest-path', [ShortestPathController::class, 'index'])->name('shortest-path-form');
Route::post('/calculate-shortest-path', [ShortestPathController::class, 'calculate'])->name('calculate-shortest-path');

// Stop routes
Route::get('/stop', [StopController::class, 'index'])->name('stop.index');
Route::get('/stop/create', [StopController::class, 'create'])->name('stop.create');
Route::post('/stop', [StopController::class, 'store'])->name('stop.store');
Route::get('/stop/{stop}/edit', [StopController::class, 'edit'])->name('stop.edit');
Route::put('/stop/{stop}/update', [StopController::class, 'update'])->name('stop.update');
Route::delete('/stop/{stop}/delete', [StopController::class, 'delete'])->name('stop.delete');

// Route routes
Route::get('/route',[RouteController::class,'index'])->name('route.index');
Route::get('/route/create',[RouteController::class,'create'])->name('route.create');
Route::resource('routes', RouteController::class);
// connection routes
Route::resource('connections', ConnectionController::class);
// routestop routes
Route::resource('routestops', RoutestopController::class);
