<?php

/* Estudio clase
 *  Nombre: Palabra
 *  Atributos: Palabra String Consultable , modificiable
 *  Get/Set : getPalabra, setPalabra
 *  Metodos añadidos: contarPalabras,posicionesPalabras,sustituirPalabras,sustPalabraPosicion
 * */

class Word{

    private $palabra;

        function __construct($palabra){

            $this->palabra = $palabra;

        }

    /**
     * @return palabra
     */
    public function getPalabra(){

        return $this->palabra;
    }



    /**
     * @param mixed $palabra
     * @return palabra
     */
    public function setPalabra($palabra){
        $this->palabra = $palabra;
    }


    /**
     * @param $palabra
     * @return int
     */
    public function contarPalabras($palabra){

        $count = substr_count(self::getPalabra(),$palabra);

        return $count;

    }


    /**
     * @param $palabra
     *
     */
    public function posicionesPalabras($letras){


         $arrPalabras = str_split(self::getPalabra());

           for($i = 0; $i < count($arrPalabras); $i++){

               if($letras == $arrPalabras[$i]){

                   echo $i;

               }

           }


    }

    /**
     * @param $letraReemplazar
     * @param $nuevaLetra
     * @return mixed
     */
    public function sustituirPalabras($letraReemplazar, $nuevaLetra){


        $resultado = str_replace ( $letraReemplazar , $nuevaLetra , self::getPalabra());

        return $resultado;

    }

    /**
     * @param $x
     * @param $y
     * @return mixed
     */
    public function sustPalabraPosicion($x,$y){

        $resultado =  str_replace($this->palabra[$x], $this->palabra[$y],self::getPalabra());

        return $resultado;

    }




}