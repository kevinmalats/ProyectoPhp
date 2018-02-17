<?php

class tiposervicio
{

    private $idTipoServicio;
    private $nombre;

    function __construct(){

    }

    function setIdTipoServicio($idTipoServicio){
        $this->idTipoServicio=$idTipoServicio;
    }

    function getIdTipoServicio(){
        return $this->idTipoServicio;
    }

    function setNombre($nombre){
        $this->nombre=$nombre;
    }

    function getNombre(){
        return $this->nombre;
    }

}
?>



