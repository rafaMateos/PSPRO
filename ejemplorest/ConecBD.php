<?php

class ConecBD{


    public function conectar(){
        $conexion = new mysqli('localhost','root','root','Usuarios');
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


}
