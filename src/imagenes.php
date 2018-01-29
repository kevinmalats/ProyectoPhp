<?php
/**
* 
*/
class Usuario {

private $id_usuario;
private $nombre ;
private $password;
private $perfil;


public function __construct(){
   

}
public function setId($id_usuario){
     $this->id_usuario=$id_usuario;
}
public function getId(){
	return $this-->id_usuario;
}
public function setNombre($var){
     $this->nombre=$var;
}
public function getNombre(){
	return $this->nombre;
}
public function setPassword($var){
     $this->password=$var;
}
public function getPassword(){
	return $this->password;
}
public function setPerfil($var){
     $this->perfil=$var;
}
public function getPerfil(){
	return $this->perfil;
}

}

?>