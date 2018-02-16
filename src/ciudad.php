<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Ciudad {

private $id_ciudad;
private $descripcion ;



public function __construct(){
   

}
public function setId($id_usuario){
     $this->id_ciudad=$id_usuario;
}
public function getId(){
	return $this->id_ciudad;
}
public function setNombre($var){
     $this->descripcion=$var;
}
public function getNombre(){
	return $this->descripcion;
}


}