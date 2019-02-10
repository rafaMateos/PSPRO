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


//Esto debe devolver true o false
public static function Authorized($request){

    $ret = true;
    $user = $request->getUser();
    $pass = $request->getPass();
    $token = getBearerToken();

    if($token != null){

        try{

            Security::decodeToken();

        }catch (Exception $e){

            $ret = false;
        }

        if(e != null){//No tenia token o token invalido

            if(LoginHandlerModel::comprobarUsuario($user,$pass)){

            }else{

                $ret = false;
            }
        }else{
            //Hacer lo que el user quiera
        }


    }else{

        $ret = false;
    }

    $ret = true;

    return $ret;

}




}
