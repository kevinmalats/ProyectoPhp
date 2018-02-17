<?php

class servicioimagen
{
    
    private $idservicioimagen;
    private $direccion;
    private $nombre;
    private $idservicio;
    private $servicio;
    
     function __construct() {
     }
    
     function setIdServicioImagen($idservicioimagen){
       $this->idservicioimagen = $idservicioimagen;
     } 
     function getIdServicioImagen(){
       return $this->idservicioimagen;
     }
     function setDireccion($direccion){
        $this->direccion = $direccion;
     } 
     function getDireccion(){
        return $this->direccion;
     }
    function setNombre($nombre){
        $this->nombre = $nombre;
     } 
     function getNombre(){
        return $this->nombre;
     } 
    function setIdServicio($idservicio){
       $this->idservicio = $idservicio;
     }
     function getIdServicio(){
       return $this->idservicio;
     }
     function setServicio($servicio){
        $this->servicio = $servicio;
     } 
     function getServicio(){
        return $this->servicio;
     }
}
?> 