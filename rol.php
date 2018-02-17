<?php

class rol
{
    private $idrol;
    private $nombre;
    private $descripcion;

     function __construct() {
     }
    
     function setIdRol($idrol){
       $this->idrol = $idrol;
     } 
     function getIdRol(){
       return $this->idrol;
     }
     function setNombre($nombre){
       $this->nombre = $nombre;
     } 
     function getNombre(){
       return $this->nombre;
     }
     function setDescripcion($descripcion){
       $this->descripcion = $descripcion;
     } 
     function getDescripcion(){
       return $this->descripcion;
     }
}
?> 
