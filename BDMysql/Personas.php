<?php

/**
 * Created by PhpStorm.
 * User: rmateos
 * Date: 22/10/18
 * Time: 10:52
 */
class Personas
{

    private $Nombre;
    private $Id;
    private $Direccion;
    private $Telefono;

    public function __construct($newNombre,$newId,$newDireccion,$newTelefono)

    {

         $this->Nombre = $newNombre;
         $this->Id = $newId;
         $this->Direccion = $newDireccion;
         $this->Telefono = $newTelefono;

    }

   public function getNombre(){

        return $this->Nombre;

   }

   public function getId(){

       return $this->Id;

   }

   public function getDireccion(){

       return $this->Direccion;

   }

   public function getTelefono(){

       return $this->Telefono;
   }



}