<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;

class Jwts
{
    private static $secret_key = 'Sdw1s9x8@';

    public static function GenerarTk($data)
    {
        $time = time();

        $token = [
            'nbf' => $time + (30 * 60),
            'iat' => $time,
            'exp' => $time + (30 * 60),
            'data' => $data,
            'iis' => $_SERVER['HTTP_HOST'],
        ];

        return JWT::encode($token, self::$secret_key, 'HS256');
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