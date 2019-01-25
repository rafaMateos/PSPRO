<?php

$user= $_POST["usuario"];
$pass = $_POST["password"];
$pass2 = $_POST["password2"];

$data = array($user,$pass);

if ($pass == $pass2){

     $datacall = registerUserInApi("POST", "http://biblioteca.devel:8080/login",json_encode($data));
     $response = json_decode($datacall, true);

    echo "Registro completado \n";

}else{
    echo "Las contraseñas no coinciden";
}

function registerUserInApi($method, $url, $data){

    $curl = curl_init();

    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: 111111111111111111111',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){

        echo("Algo salio mal");
    }

    curl_close($curl);
    return $result;
}


