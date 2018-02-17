<?php

class sugerencia
{

    private $idsugerencia;
    private $tema;
    private $mensaje;
    private $id_usuario;
    private $nombre;

    function __construct(){
    }
    function setIdsugerencia($idsugerencia){
        $this->idsugerencia=$idsugerencia;
    }
    function getIdsugerencia(){
        return $this->idsugerencia;
    }
    function setTema($tema){
        $this->tema=$tema;
    }
    function getTema(){
        return $this->tema;
    }
    function setMensaje($mensaje){
        $this->mensaje=$mensaje;
    }
    function getMensaje(){
        return $this->mensaje;
    }
    function setIdusuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }
    function getIdusuario(){
        return $this->id_usuario;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    } 
    function getNombre(){
        return $this->nombre;
    }
}
?> 



