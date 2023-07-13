<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;

class MyClass
{
    // private static $api_url = "http://11.11.11.20:8100/ws/live2.php"; //enpoint pddikti
    private static $api_url = "http://10.237.15.96:8100/ws/live2.php";

    public static function getToken($username, $password)
    {
        $url = static::$api_url;

        $response = Http::post($url, [
            'act' => 'GetToken',
            'username' => $username,
            'password' => $password
        ]);

        return $response->json();
    }

    public static function fetchData($action, $token, $filter, $limit)
    {
        $url = static::$api_url;

        $response = Http::post($url, [
            'act' => $action,
            'token' => $token,
            'filter' => $filter,
            'limit' => $limit
        ]);

        return $response->json();
    }

    public static function insertData($data)
    {
        $url = static::$api_url;

        // dd(session()->get('tokenPddikti'));
        $response = Http::post($url, [
            'act' => 'InsertBiodataMahasiswa',
            'token' => session()->get('tokenPddikti'),
            'record' => [
                "nama_mahasiswa" => $data->nama_mahasiswa,
                "jenis_kelamin" => $data->jenis_kelamin,
                "tempat_lahir" => $data->tempat_lahir,
                "tanggal_lahir" => $data->tanggal_lahir,
                "id_agama" => $data->id_agama,
                "nik" => $data->nik,
                "nisn" => $data->nisn,
                "kewarganegaraan" => $data->kewarganegaraan,
                "jalan" => $data->jalan,
                "dusun" => $data->dusun,
                "rt" => $data->rt,
                "rw" => $data->rw,
                "kelurahan" => $data->kelurahan,
                "kode_pos" => $data->kode_pos,
                "id_wilayah" => $data->id_wilayah,
                "id_jenis_tinggal" => $data->id_jenis_tinggal,
                "id_alat_transportasi" => $data->id_alat_transportasi,
                "telepon" => $data->telepon,
                "handphone" => $data->handphone,
                "email" => $data->email,
                "penerima_kps" => $data->penerima_kps,
                "nomor_kps" => $data->nomor_kps,
                "nik_ayah" => $data->nik_ayah,
                "nama_ayah" => $data->nama_ayah,
                "tanggal_lahir_ayah" => $data->tanggal_lahir_ayah,
                "id_pendidikan_ayah" => $data->id_pendidikan_ayah,
                "id_pekerjaan_ayah" => $data->id_pekerjaan_ayah,
                "id_penghasilan_ayah" => $data->id_penghasilan_ayah,
                "nik_ibu" => $data->nik_ibu,
                "nama_ibu_kandung" => $data->nama_ibu_kandung,
                "tanggal_lahir_ibu" => $data->tanggal_lahir_ibu,
                "id_pendidikan_ibu" => $data->id_pendidikan_ibu,
                "id_pekerjaan_ibu" => $data->id_pekerjaan_ibu,
                "id_penghasilan_ibu" => $data->id_penghasilan_ibu,
                "npwp" => $data->npwp,
                "nama_wali" => $data->nama_wali,
                "tanggal_lahir_wali" => $data->tanggal_lahir_wali,
                "id_pendidikan_wali" => $data->id_pendidikan_wali,
                "id_pekerjaan_wali" => $data->id_pekerjaan_wali,
                "id_penghasilan_wali" => $data->id_penghasilan_wali,
                "id_kebutuhan_khusus_mahasiswa" => $data->id_kebutuhan_khusus_mahasiswa,
                "id_kebutuhan_khusus_ayah" => $data->id_kebutuhan_khusus_ayah,
                "nama_kebutuhan_khusus_ayah" => $data->nama_kebutuhan_khusus_ayah,
                "id_kebutuhan_khusus_ibu" => $data->id_kebutuhan_khusus_ibu,
            ]
        ]);

        return $response->json();
    }

    public static function deleteData($id)
    {
        $url = static::$api_url;

        // dd($id);
        $response = Http::post($url, [
            'act' => 'DeleteBiodataMahasiswa',
            'token' => session()->get('tokenPddikti'),
            "key" => [
                "id_mahasiswa" => $id
            ]
        ]);

        return $response->json();
    }
}
