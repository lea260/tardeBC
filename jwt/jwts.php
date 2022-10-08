<?php

require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class jwts
{
    private static $secret_key = 'Sdw1s9x8@';
    public static function SignIn($data)
    {
        $time = time();

        $token = array(
            'exp' => $time + (30 * 60),
            'data' => $data,
        );

        return JWT::encode($token, self::$secret_key);
   
}
public static function GenerarTk($data)
{
    $time = time();

    $token = array(
        'nbf'  => $time + (30 * 60),
        'iat'  => $time,
        'exp'  => $time + (30 * 60),
        'data' => $data,
        'iss'  =>  $data,
    );

    return JWT::encode($token, self::$secret_key,'HS256');
}
public static function value($token)
    {
        if (empty($token)) {
            throw new Exception("Invalid token supplied.");
        }

        $decode = JWT::decode(
            $token,
            self::$secret_key,
        );
    }

}