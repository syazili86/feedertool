<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BiodataMahasiswaController;
use App\Http\Controllers\MahasiswaLulusDOController;

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

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/biodata-mahasiswa', [BiodataMahasiswaController::class, 'index'])->name('dashboard.biodata-mahasiswa');
    Route::get('/dashboard/mahasiswa-lulus-do', [MahasiswaLulusDOController::class, 'index'])->name('dashboard.mahasiswa-lulus-do');

    Route::post('/get-token', [DashboardController::class, 'getToken'])->name('dashboard.get-token');
});
