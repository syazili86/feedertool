<?php

namespace App\Http\Controllers;

use App\Providers\MyClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $response = getDataWithAct('GetProfilPT', null);
        $getCountBiodataMahasiswa = getDataWithAct('GetCountBiodataMahasiswa');
        $getCountListDosen = getDataWithAct('GetListDosen');
        $getCountMahasiswaLulusDO = getDataWithAct('GetCountMahasiswaLulusDO');

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'data' => $response ? $response['data'][0] : $response,
            'countBiodataMahasiswa' => $getCountBiodataMahasiswa ? $getCountBiodataMahasiswa['data'] : $getCountBiodataMahasiswa,
            'countListDosen' => $getCountListDosen ? count($getCountListDosen['data']) : $getCountListDosen,
            'countMahasiswaLulusDO' => $getCountMahasiswaLulusDO ? $getCountMahasiswaLulusDO['data'] : $getCountMahasiswaLulusDO,
        ]);
    }

    public function getToken(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $response =  MyClass::getToken($request->username, $request->password);

        if ($response['error_code'] !== 0) {
            return back()->with('message', $response['error_desc']);
        } else {
            $request->session()->put('tokenPddikti', $response['data']['token']);
            return back();
        }
    }
}
