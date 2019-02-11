<?php

require_once "ConecBD.php";

$metodos = new ConecBD();
$conex;

$nombre = $_POST["Nombre"];
$Contraseña = $_POST["Contraseña"];

$conex = $metodos->conectar();

//Hash la contraseña

$hashed_password = password_hash($Contraseña,PASSWORD_DEFAULT);

//Insertamos en la BD
$sql = "INSERT INTO Login(Nombre,Contra) VALUES ('$nombre','$hashed_password')";
$conex->query($sql);


//Obtenemos la contraseña y conprobamos

/*
$sql = "SELECT * FROM Login where 1";

$resultado = $conex->query($sql);

$row = $resultado->fetch_assoc();

    $contra = $row["Contra"];


if(password_verify($Contraseña, $hashed_password)) {

    echo 'Contra correcta nene flama';

}else{

    echo 'Nada nene flama';
}
*/