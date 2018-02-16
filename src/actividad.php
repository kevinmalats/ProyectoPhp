<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
 class Actividad{
    private $id_actividad;
    private $descripcion;
    private $guarderia_id_guarderia;

public function __construct(){
   

}
public function setId($id){
	$this->id_actividad=$id;
}	
public function getId(){
	return $this->id_actividad;
}
public function setDescripcion($descripcion){
	$this->descripcion=$descripcion;

}
public function getDescripcion(){
	return $this->descripcion;
}
public function setGuarderia($guarderia_id_guarderia){
	$this->$guarderia_id_guarderia=$guarderia_id_guarderia;

}
public function getGuarderia(){
	return $this->$guarderia_id_guarderia;
}
}
?>
