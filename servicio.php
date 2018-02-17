<?php

class servicio
{
    private $idservico;
    private $idtiposervicio;
    private $idusuario;
    private $servicio;
    private $descripcion;
    private $usuario;
    function __construct() {
    }
    
    function setIdServicio($idservico){
        $this->idservico = $idservico;
    } 
    function getIdServicio(){
        return $this->idservico;
    }
    function setIdTipoServicio($idtiposervicio){
        $this->idtiposervicio = $idtiposervicio;
    } 
    function getIdTipoServicio(){
        return $this->idtiposervicio;
    }
    function setIdUsuario($idusuario){
        $this->idusuario = $idusuario;
    } 
    function getIdUsuario(){
        return $this->idusuario;
    }
    function setServicio($servicio){
        $this->servicio = $servicio;
    } 
    function getServicio(){
        return $this->servicio;
    }
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    } 
    function getDescripcion(){
        return $this->descripcion;
    }
    function setUsuario($usuario){
        $this->idusuario = $usuario;
    } 
    function getUsuario(){
        return $this->idusuario;
    }
}
?> 
