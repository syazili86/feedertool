<?php

use App\Providers\MyClass;

if (!function_exists(function: 'getDataWithAct')) {

    function getDataWithAct($action, $limit = null, $filter = null)
    {
        if (session()->has('tokenPddikti')) {
            $token = session()->get('tokenPddikti');

            $data = MyClass::fetchData($action, $token, $filter, $limit);

            if ($data['error_code'] === 100) {
                $data = false;
                session()->forget('tokenPddikti');
            }
        } else {
            $data = false;
        }

        return $data;
    }
}
