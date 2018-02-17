<?php

class producto
{
    private $idproducto;
    private $idtipoproducto;
    private $idusuario;
    private $producto;
    private $descripcion;
    private $usuario;

     function __construct() {
     }
    
     function setIdProducto($idproducto){
       $this->idproducto = $idproducto;
     } 
     function getIdProducto(){
       return $this->idproducto;
     }
     function setIdTipoProducto($idtipoproducto){
       $this->idtipoproducto = $idtipoproducto;
     } 
     function getIdTipoProducto(){
       return $this->idtipoproducto;
     }
     function setIdUsuario($idusuario){
       $this->idusuario = $idusuario;
     } 
     function getIdUsuario(){
       return $this->idusuario;
     }
    function setProducto($producto){
        $this->producto = $producto;
    } 
    function getProducto(){
        return $this->producto;
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
