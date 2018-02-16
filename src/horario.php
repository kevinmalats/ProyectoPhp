<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Horario {

private $id_horario;
private $actividad_id_actividad;



public function __construct(){
   
}
public function setId($id_horario){
     $this->id_horario=$id_horario;
}
public function getId(){
	return $this->id_horario;
}
public function setIdActividad($var){
     $this->actividad_id_actividad=$var;
}
public function getIdActividad(){
	return $this->actividad_id_actividad;
}


}

?>
