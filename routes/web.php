<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->name('dashboard.index');

Route::get('/dasboard/biodata-mahasiswa', function () {
    return view('dashboard.biodata-mahasiswa.index', [
        'parent' => 'Mahasiswa',
        'title' => 'Biodata Mahasiswa'
    ]);
})->name('dashboard.biodata-mahasiswa');
