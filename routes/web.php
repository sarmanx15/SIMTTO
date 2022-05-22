<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DataRequestController;
use App\Http\Controllers\FormRequestController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PasienKamarController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// main
Route::get('/dashboard', [mainController::class, 'index'])->middleware('admin');
// User
Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('admin');
Route::post('/user/create', [userController::class, 'create'])->middleware('admin');
Route::get('/user/delete/{id}', [userController::class, 'delete'])->middleware('admin');
Route::post('/user/update', [userController::class, 'update'])->name('update.user')->middleware('admin');
// Kamar
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar')->middleware('admin');
Route::post('/kamar/create', [KamarController::class, 'create'])->middleware('admin');
Route::get('/kamar/delete/{id}', [KamarController::class, 'delete'])->middleware('admin');
Route::post('/kamar/update', [KamarController::class, 'update'])->name('update.kamar')->middleware('admin');

// Login
Route::get('/log', [LoginController::class, 'index'])->name('login');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class, 'authenticate'])->name('autenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Error
