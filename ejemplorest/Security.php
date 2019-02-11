<?php

require_once 'JWT.php';
require_once 'index.php';

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


//Esto debe devolver true o false si tiene o no tiene permisos
public static function Authorized($request){

    $autorizado = true;
    $user = $request->getUser();
    $pass = $request->getPass();
    $token = getBearerToken();

    $e = null;

        if($token != null){

            try{

                Security::decodeToken($token);

            }catch (Exception $e){

                $autorizado = false;
            }

        }else if ($user != null && $pass != null){

            if(LoginHandlerModel::comprobarUsuario($user,$pass)){

                $autorizado = true;

            }else{

                $autorizado = false;
            }

        }else{

            $autorizado = false;

        }




    //$ret = true;


    return $autorizado;

}




}
