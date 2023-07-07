<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;

class MyClass
{
    private static $api_url = "http://11.11.11.20:8100/ws/live2.php";

    public static function getToken($username, $password)
    {
        $url = static::$api_url;

        $response = Http::post($url, [
            'act' => 'GetToken',
            'username' => $username,
            'password' => $password
        ]);

        return json_decode($response->body());
    }

    public static function getProfilPT($token)
    {
        $url = static::$api_url;

        $response = Http::post($url, [
            'act' => 'GetProfilPT',
            'token' => $token
        ]);

        return json_decode($response->body());
    }
}
