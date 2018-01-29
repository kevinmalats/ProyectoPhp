<?php
/**
* 
*/
class Informacion_usuario {

private $id_usuario;
private $nombres ;
private $apellidos;
private $correo;
private $foto_perfil;
private $usuario_id_usuario;
private $direccion;


public function __construct(){
   

}
public function setId($id_usuario){
     $this->id_usuario=$id_usuario;
}
public function getId(){
	return $this->id_usuario;
}
public function setNombres($var){
     $this->nombres=$var;
}
public function getNombres(){
	return $this->nombres;
}
public function setApellidos($var){
     $this->apellidos=$var;
}
public function getApellidos(){
	return $this->apellidos;
}
public function setCorreo($var){
     $this->correo=$var;
}
public function getCorreo(){
	return $this->correo;
}
public function setFotoPerfil($var){
     $this->foto_perfil=$var;
}
public function getFotoPerfil(){
	return $this->foto_perfil;
}
public function setUsuario_idUasuario($var){
     $this->usuario_id_usuario=$var;
}
public function getUsuario_idUsuario(){
	return $this->usuario_id_usuario;
}
public function setIdDireccion($var){
     $this->direccion=$var;
}
public function getIdDireccion(){
	return $this->direccion;
}

}

?>