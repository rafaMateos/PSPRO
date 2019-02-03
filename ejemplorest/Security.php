<?php

require_once 'JWT.php';

use \Firebase\JWT\JWT;


class Security {



private static $KEY = "prueba";



public static function generateToken(){


    $token = array(
        "iss" => "http://example.org",
        "aud" => "http://example.com",
        "iat" => time(),
    );

    $jwt = JWT::encode($token, self::$KEY);

    return $jwt;
}

public static function decodeToken($jwt){

    $decoded = JWT::decode($jwt, self::$KEY, array('HS256'));

    return $decoded;

}




}
