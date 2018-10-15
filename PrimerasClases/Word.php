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
     */
    public function posicionesPalabras($letras){

         $arrPalabras = str_split(self::getPalabra());

           foreach ($arrPalabras as $valor){

               echo $valor;
           }


    }

}