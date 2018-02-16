<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Guarderia {

private $id_guarderia;
private $nombre ;
private $ciudad_id_ciudad;    


public function __construct(){
   

}
public function setId($id_guarderia){
     $this->id_guarderia=$id_guarderia;
}
public function getId(){
	return $this->id_guarderia;
}
public function setNombre($var){
     $this->nombre=$var;
}
public function getNombre(){
	return $this->nombre;
}
public function setCiudadIdCiudad($var){
     $this->ciudad_id_ciudad=$var;
}
public function getCiudadIdCiudad(){
	return $this->ciudad_id_ciudad;
}
    
}
?>