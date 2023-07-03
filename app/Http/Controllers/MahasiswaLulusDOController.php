<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaLulusDOController extends Controller
{
    public function index()
    {
        return view('dashboard.mahasiswa-lulus-do.index', [
            'parent' => 'Mahasiswa',
            'title' => 'Mahasiswa Lulus DO'
        ]);
    }
}
