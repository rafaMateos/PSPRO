<?php

/* Estudio clase
 *  Nombre: Palabra
 *
 * */

class Word{

    public $palabra;

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

    public function sustituirPalabras($letraReemplazar, $nuevaLetra){


        $resultado = str_replace ( $letraReemplazar , $nuevaLetra , self::getPalabra());

        return $resultado;

    }


    public function sustPalabraPosicion($x,$y){

        $resultado =  str_replace($this->palabra[$x], $this->palabra[$y],self::getPalabra());

        return $resultado;

    }




}