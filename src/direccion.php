<?php
/**
* 
*/
class Direccion {

private $id_direccion;
private $descripcion ;



public function __construct(){
   

}
public function setId($id_usuario){
     $this->id_direccion=$id_usuario;
}
public function getId(){
	return $this-->id_direccion;
}
public function setDescripcion($var){
     $this->descripcion=$var;
}
public function getDescripcion(){
	return $this->descripcion;
}

}

?>