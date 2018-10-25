<?php
/**
 * Created by PhpStorm.
 * User: rmateos
 * Date: 22/10/18
 * Time: 11:13
 */
require_once "GestoraBD.php";

$metodos = new GestoraBD();


$conex;



$conex = $metodos->conectar();

$metodos->ComprobarConex($conex);

$sql = "INSERT INTO Datos(Id,Nombre) VALUES (1,'Rafael')";

$metodos->realizarInsert($conex,$sql);

echo "<div>";
echo "Consulta";
echo "<div>";

$sql = "SELECT * FROM Datos";

$metodos->realizarConsulta($conex,$sql);


