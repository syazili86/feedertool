<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;

class MyClass
{
    private static $api_url = "http://11.11.11.20:8100/ws/live2.php";
    // private static $api_url = "http://10.237.15.96:8100/ws/live2.php";

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
}
