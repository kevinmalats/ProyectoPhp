<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Comentario {

private $id_comentario;
private $descripcion ;
private $informacion_usuario_id_usuario;
private $guarderia_id_guarderia;



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
public function setGuarderia($var){
     $this->guarderia_id_guarderia=$var;
}
public function getGuarderia(){
    return $this->guarderia_id_guarderia;
}
}

?>