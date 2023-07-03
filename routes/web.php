<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'title' => 'Dashboard'
        ]);
    })->name('dashboard.index');
    Route::get('/dashboard/biodata-mahasiswa', function () {
        return view('dashboard.biodata-mahasiswa.index', [
            'parent' => 'Mahasiswa',
            'title' => 'Biodata Mahasiswa'
        ]);
    })->name('dashboard.biodata-mahasiswa');
    Route::get('/dashboard/mahasiswa-lulus-do', [MahasiswaLulusDOController::class, 'index'])->name('dashboard.mahasiswa-lulus-do');
});
