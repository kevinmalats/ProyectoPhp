<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Telefono {

private $id_telefono;
private $descripcion ;
private $informacion_usuario_id_usuario;


public function __construct(){
   

}
public function setId($id_telefono){
     $this->id_telefono=$id_telefono;
}
public function getId(){
	return $this->id_telefono;
}
public function setDescripcion($var){
     $this->descripcion=$var;
}
public function getDescripcion(){
	return $this->descripcion;
}
public function setInfoUsua($var){
     $this->informacion_usuario_id_usuario=$var;
}
public function getInfoUsua(){
	return $this->informacion_usuario_id_usuario;
}


}

?>