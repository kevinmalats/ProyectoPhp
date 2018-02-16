<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class PersonalGuarderia {

private $id_personal;
private $nombres ;
private $apellidos;
private $cargo;    
private $guarderia_id_guarderia;    


public function __construct(){
   

}
public function setId($id_personal){
     $this->id_personal=$id_personal;
}
public function getId(){
	return $this->id_personal;
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
public function setCargo($var){
     $this->cargo=$var;
}
public function getCargo(){
	return $this->cargo;
}
public function setGuarderiaIdGuarderia($var){
     $this->guarderia_id_guarderia=$var;
}
public function getGuarderiaIdGuarderia(){
	return $this->guarderia_id_guarderia;
}
    
}
?>