<?php

class credencial
{
    private $idCredencial;
    private $usuario;
    private $clave;

     function __construct() {
     }
    
     function setIdCredencial($idCredencial){
       $this->idCredencial = $idCredencial;
     } 
     function getIdCredencial(){
       return $this->idCredencial;
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
}
?> 
