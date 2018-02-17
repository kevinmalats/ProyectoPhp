<?php

    class comentario
    {
    private $idcomentario;
    private $comentario;
    private $idpublicacion;
    private $idusuario;
    private $titulo;
    private $nombre;
    private $fecha;
     function __construct() {
     }
     
     function setIdComentario($idcomentario){
       $this->idcomentario = $idcomentario;
     } 
     function getIdComentario(){
       return $this->idcomentario;
     }
     function setComentario($comentario){
       $this->comentario = $comentario;
     } 
     function getComentario(){
       return $this->comentario;
     }
     function setIdPublicacion($idpublicacion){
       $this->idpublicacion = $idpublicacion;
     } 
     function getIdPublicacion(){
       return $this->idpublicacion;
     }
     function setIdUsuario($idusuario){
       $this->idusuario = $idusuario;
     } 
     function getIdUsuario(){
       return $this->idusuario;
     }
     function setTitulo($titulo){
       $this->titulo = $titulo;
     } 
     function getTitulo(){
       return $this->titulo;
     }
     function setNombre($nombre){
       $this->nombre = $nombre;
     } 
     function getNombre(){
       return $this->nombre;
     }
     function setFecha($fecha){
       $this->fecha = $fecha;
     } 
     function getFecha(){
       return $this->fecha;
     }
}
?> 
