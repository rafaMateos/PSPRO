<?php

require_once "GestoraBD.php";

$metodos = new GestoraBD();
$conex;

//Determina si una variable está definida y no es NULL
//if(isset($_POST["Nombre"])){

    $nombre = $_POST["Nombre"];

//}else {

    //$nombre = null;
    //echo "Nombre caca";echo '<br>';
//}


//if(isset($_POST["Id"])){

    $Id = $_POST["Id"];

//}else {

   // $Id = null;
    //echo "Id caca";echo '<br>';
//}

//if(isset($_POST["Direccion"])){

    $Direccion = $_POST["Direccion"];

//}else {

    //$Direccion = null;
    //echo "Direccion caca";echo '<br>';
//}


///if(isset($_POST["Telefono"])){

    $Telefono = $_POST["Telefono"];

//}else {

    //$Telefono = null;
    //echo "Telefono caca";echo '<br>';
//}




echo "<h2>Hacemos la conexcion y comprobamos que tal</h2>";
$conex = $metodos->conectar();

$metodos->ComprobarConex($conex);

echo "<div>";

echo "<h2>Realizamos el insert</h2>";

$sql = "INSERT INTO Datos(Id,Nombre,Direccion,Telefono) VALUES ($Id,'$nombre','$Direccion',$Telefono)";

$metodos->realizarInsert($conex,$sql);
echo "<div>";

//php es mierda :D <3 te quiero rafa
echo "<h2>Consulta</h2>";
echo "<div>";

$sql = "SELECT * FROM Datos";
$metodos->realizarConsulta($conex,$sql);


