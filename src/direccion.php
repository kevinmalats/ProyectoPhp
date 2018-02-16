<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Direccion {

private $id_direccion;
private $descripcion ;
private $guarderia_id_guarderia ;


public function __construct(){
   
}
public function setId($id_direccion){
     $this->id_direccion=$id_direccion;
}
public function getId(){
	return $this->id_direccion;
}
public function setDescripcion($var){
     $this->descripcion=$var;
}
public function getDescripcion(){
	return $this->descripcion;
}
public function setGuarderia($var){
     $this->guarderia_id_guarderia=$var;
}
public function getGuarderia(){
	return $this->guarderia_id_guarderia;
}
    

}

?>
