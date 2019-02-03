<?php


class CapituloModel implements JsonSerializable
{
    private $codigoLibro;
    private $codigoCapitulo;
    private $tituloCapitulo;
    private $paginaIncial;
    private $paginaFinal;

    public function __construct($codLib ,$codCap, $titCap, $pagI, $pagF)
    {
        $this->codigoLibro=$codLib;
        $this->codigoCapitulo=$codCap;
        $this->tituloCapitulo=$titCap;
        $this->paginaIncial=$pagI;
        $this->paginaFinal=$pagF;
    }


    //Needed if the properties of the class are private.
    //Otherwise json_encode will encode blank objects
    function jsonSerialize()
    {
        return array(
            'codigoLibro' => $this->codigoLibro,
            'codigoCapitulo' => $this->codigoCapitulo,
            'tituloCapitulo' => $this->tituloCapitulo,
            'paginaInicial' => $this->paginaIncial,
            'paginaFinal' => $this->paginaFinal
        );
    }

    public function __sleep(){
        return array('codigoLibro' , 'codigoCapitulo' , 'tituloCapitulo', 'paginaInicial','paginaFinal');
    }

    /**
     * @return mixed
     */
    public function getCodigoLibro()
    {
        return $this->codigoLibro;
    }

    /**
     * @param mixed $codigoLibro
     */
    public function setCodigoLibro($codigoLibro)
    {
        $this->codigoLibro = $codigoLibro;
    }

    /**
     * @return mixed
     */
    public function getCodigoCapitulo()
    {
        return $this->codigoCapitulo;
    }

    /**
     * @param mixed $codigoCapitulo
     */
    public function setCodigoCapitulo($codigoCapitulo)
    {
        $this->codigoCapitulo = $codigoCapitulo;
    }

    /**
     * @return mixed
     */
    public function getTituloCapitulo()
    {
        return $this->tituloCapitulo;
    }

    /**
     * @param mixed $tituloCapitulo
     */
    public function setTituloCapitulo($tituloCapitulo)
    {
        $this->tituloCapitulo = $tituloCapitulo;
    }

    /**
     * @return mixed
     */
    public function getPaginaIncial()
    {
        return $this->paginaIncial;
    }

    /**
     * @param mixed $paginaIncial
     */
    public function setPaginaIncial($paginaIncial)
    {
        $this->paginaIncial = $paginaIncial;
    }

    /**
     * @return mixed
     */
    public function getPaginaFinal()
    {
        return $this->paginaFinal;
    }

    /**
     * @param mixed $paginaFinal
     */
    public function setPaginaFinal($paginaFinal)
    {
        $this->paginaFinal = $paginaFinal;
    }




}