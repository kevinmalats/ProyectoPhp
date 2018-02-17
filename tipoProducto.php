<?php

class tipoProducto
{

    private $idTipoProducto;
    private $nombre;

    function __construct(){

    }

    function setIdTipoProducto($idTipoProducto){
        $this->idTipoProducto=$idTipoProducto;
    }

    function getIdTiPoproducto(){
        return $this->idTipoProducto;
    }

    function setNombre($nombre){
        $this->nombre=$nombre;
    }

    function getNombre(){
        return $this->nombre;
    }

}
?> 



