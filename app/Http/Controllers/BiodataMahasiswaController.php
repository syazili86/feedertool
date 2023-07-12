<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use function PHPSTORM_META\type;

class BiodataMahasiswaController extends Controller
{
    public function index()
    {
        // $response = getDataWithAct('GetBiodataMahasiswa', 10);
        // $responseBiodataMahasiswa = $response->data;

        // foreach ($responseBiodataMahasiswa as $response) {
        //     var_dump($response->nama_mahasiswa);
        // }


        // $responseBiodataMahasiswa = $response['data'];
        // dd($responseBiodataMahasiswa);
        // dd(array_search($nama, $responseBiodataMahasiswa));
        // dd($responseBiodataMahasiswa);
        // dd(gettype($responseBiodataMahasiswa));

        return view('dashboard.biodata-mahasiswa.index', [
            'parent' => 'Mahasiswa',
            'title' => 'Biodata Mahasiswa'
        ]);
    }
}
