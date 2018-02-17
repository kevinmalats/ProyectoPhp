<?php

class productoimagen
{
    
    private $idproductoimagen;
    private $direccion;
    private $nombre;
    private $idproducto;
    private $producto;
    
     function __construct() {
     }
    
     function setIdProductoImagen($idproductoimagen){
       $this->idproductoimagen = $idproductoimagen;
     } 
     function getIdProductoImagen(){
       return $this->idproductoimagen;
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
    function setIdProducto($idproducto){
       $this->idproducto = $idproducto;
     }
     function getIdProducto(){
       return $this->idproducto;
     }
     function setProducto($producto){
        $this->producto = $producto;
     } 
     function getProducto(){
        return $this->producto;
     }
}
?> 
