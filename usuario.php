<?php

class usuario
{
    private $idusuario;
    private $nombre;
    private $identificacion;
    private $correo;
    private $telefono;
    private $direccion;
    private $idrol;
    private $idcredencial;
    private $usuario;
    private $clave;
    private $rol;
    private $dirimg;
    private $nomimg;
    
    function __construct() {
    }    
    function setIdUsuario($idusuario){
        $this->idusuario = $idusuario;
    } 
    function getIdUsuario(){
      return $this->idusuario;
    }
    function setNombre($nombre){
      $this->nombre = $nombre;
    } 
    function getNombre(){
      return $this->nombre;
    }
    function setIdentificacion($identificacion){
      $this->identificacion = $identificacion;
    } 
    function getIdentificacion(){
      return $this->identificacion;
    }
    function setCorreo($correo){
      $this->correo = $correo;
    } 
    function getCorreo(){
      return $this->correo;
    }
    function setTelefono($telefono){
      $this->telefono = $telefono;
    } 
    function getTelefono(){
      return $this->telefono;
    }
    function setDireccion($direccion){
      $this->direccion = $direccion;
    } 
    function getDireccion(){
      return $this->direccion;
    }
    function setIdRol($idrol){
      $this->idrol = $idrol;
    } 
    function getIdRol(){
      return $this->idrol;
    }
    function setIdcredencial($idcredencial){
      $this->idcredencial = $idcredencial;
    } 
    function getIdcredencial(){
      return $this->idcredencial;
    }
    function setUsuario($usuario){
      $this->usuario = $usuario;
    } 
    function getUsuario(){
      return $this->usuario;
    }
    function setClave($clave){
      $this->clave = $clave;
    } 
    function getClave(){
      return $this->clave;
    }
    function setRol($rol){
      $this->rol = $rol;
    } 
    function getRol(){
      return $this->rol;
     }
    function setDirImg($dirimg){
      $this->dirimg = $dirimg;
    } 
    function getDirImg(){
      return $this->dirimg;
    }
    function setNomImg($nomimg){
      $this->nomimg = $nomimg;
    } 
    function getNomImg(){
      return $this->nomimg;
     }
}
?> 
