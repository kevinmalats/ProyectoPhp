<?php
/**
* 
*/
class Comentario {

private $id_comentario;
private $descripcion ;
private $informacion_usuario_id_usuario;



public function __construct(){
   

}
public function setId($id_comentario){
     $this->id_comentario=$id_comentario;
}
public function getId(){
	return $this->id_comentario;
}
public function setDescripcion($var){
     $this->descripcion=$var;
}
public function getDescripcion(){
	return $this->descripcion;
}
public function setUsuario($var){
     $this->informacion_usuario_id_usuario=$var;
}
public function getUsuario(){
	return $this->informacion_usuario_id_usuario;
}

}

?>