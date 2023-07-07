<?php

namespace App\Http\Controllers;

use App\Providers\MyClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // dd(MyClass::getToken());

        // $api_url = "http://11.11.11.20:8100/ws/live2.php";

        // $response = Http::post($api_url, [
        //     'act' => 'GetProfilPT',
        //     'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZF9wZW5nZ3VuYSI6ImY3ZDlkNDA2LTRlN2MtNDM5ZC1iODQ0LTIyM2JhZDVkZTI4YSIsInVzZXJuYW1lIjoiMDIxMDE5Iiwibm1fcGVuZ2d1bmEiOiIgVU5JVkVSU0lUQVMgQklOQSBEQVJNQSAgICAgICAgICAgICAgICAgIiwidGVtcGF0X2xhaGlyIjoiIiwidGdsX2xhaGlyIjpudWxsLCJqZW5pc19rZWxhbWluIjoiTCIsImFsYW1hdCI6Ikpsbi4gQWhtYWQgWWFuaSBOby4zIFBhbGVtYmFuZyIsInltIjoidW5pdmVyc2l0YXNAYmluYWRhcm1hLmFjLmlkIiwic2t5cGUiOiIiLCJub190ZWwiOiIwODExNzEyNTU4MiIsImFwcHJvdmFsX3BlbmdndW5hIjoiMSIsImFfYWt0aWYiOiIxIiwidGdsX2dhbnRpX3B3ZCI6IjIwMjItMDktMjdUMTc6MDA6MDAuMDAwWiIsImlkX3NkbV9wZW5nZ3VuYSI6bnVsbCwiaWRfcGRfcGVuZ2d1bmEiOm51bGwsImlkX3dpbCI6IjExNjAwMCAgIiwibGFzdF91cGRhdGUiOiIyMDIyLTA5LTI4VDAyOjU5OjUwLjkyM1oiLCJzb2Z0X2RlbGV0ZSI6IjAiLCJsYXN0X3N5bmMiOiIyMDIzLTA3LTA2VDA0OjMwOjE0LjIwOFoiLCJpZF91cGRhdGVyIjoiZjdkOWQ0MDYtNGU3Yy00MzlkLWI4NDQtMjIzYmFkNWRlMjhhIiwiY3NmIjoiMTYwMTkwMzA5NCIsInRva2VuX3JlZyI6bnVsbCwiamFiYXRhbiI6bnVsbCwidGdsX2NyZWF0ZSI6IjE5NjktMTItMzFUMTc6MDA6MDAuMDAwWiIsImlkX3BlcmFuIjozLCJubV9wZXJhbiI6IkFkbWluIFBUIiwiaWRfc3AiOiI3MjFjYjg3Ny01ODRhLTQ4ODgtYTBlYS1jMjgzMTBjYzRjM2QiLCJpYXQiOjE2ODg2MTkyNDcsImV4cCI6MTY4ODYyMTA0N30.pakMwRWibOM2fmLaKwBQkBj67Esq71k4jcRVmTHzFS4',
        // ]);

        // $dataProfilPT = json_decode($response->body());

        // dd($dataProfilPT->error_code);
        // dd($dataProfilPT->data[0]->nama_perguruan_tinggi);

        // $request->session()->put('tokenPddikti', 'tokennnnn');

        if ($request->session()->has('tokenPddikti')) {
            $token = $request->session()->get('tokenPddikti');

            $getProfilPT = MyClass::getProfilPT($token);

            if ($getProfilPT->error_code === 100) {
                $getProfilPT = false;
                $request->session()->forget('tokenPddikti');
            } else {
                $getProfilPT = $getProfilPT->data[0];
            }
        } else {
            $getProfilPT = false;
        }

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'getProfilPT' => $getProfilPT
        ]);
    }

    public function getToken(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $response =  MyClass::getToken($request->username, $request->password);

        if ($response->error_code !== 0) {
            return back()->with('message', $response->error_desc);
        } else {
            $request->session()->put('tokenPddikti', $response->data->token);
            return back();
        }
    }
}
