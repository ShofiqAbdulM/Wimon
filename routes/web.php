<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventFController;
use App\Http\Controllers\EventBController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('keyword');
Route::get('/events', [EventFController::class, 'index'])->name('event');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Route API Data Wisata
Route::get('/wisata/{id}', [FrontController::class, 'lokasi']);
