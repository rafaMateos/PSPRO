<?php
/**
 * Created by PhpStorm.
 * User: rafa
 * Date: 25/10/18
 * Time: 21:38
 */

class GestoraBD
{


    public function conectar(){

        $conexion = new mysqli('localhost','root','root','Personas');
        return $conexion;

    }

    public function ComprobarConex($conexion){

        if ($conexion->connect_error) {

            trigger_error("Error al conectar: " . $conexion->connect_error,

                E_USER_ERROR);
        }else{

            echo "Conexcion flama nene";
        }
    }

    public function realizarInsert($conexion, $sql){


        if ($conexion->query($sql) === TRUE) {

            echo "To el insert crema";

        } else {

            echo "Error al insert: " . $conexion->error;
        }
    }

    public function realizarConsulta($conn,$sql){


        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {

            while($row = $resultado->fetch_assoc()) {

                echo "id: " . $row["Id"]. " - Name: " . $row["Nombre"]. " " .$row["Direccion"]. " " . $row["Telefono"]. "<br>";

            }
        } else {

            echo "Nada der nada";
        }

    }


}