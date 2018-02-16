<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Dia {

private $id_dia;
private $nombre ;
private $hora_inicio;
private $hora_fin;
private $horario_id_horario;    


public function __construct(){
   

}
public function setId($id_dia){
     $this->id_dia=$id_dia;
}
public function getId(){
	return $this->id_dia;
}
public function setNombre($var){
     $this->nombre=$var;
}
public function getNombre(){
	return $this->nombre;
}
public function setHoraInicio($var){
     $this->hora_inicio=$var;
}
public function getHoraInicio(){
	return $this->hora_inicio;
}
public function setHoraFin($var){
     $this->hora_fin=$var;
}
public function getHoraFin(){
	return $this->hora_fin;
}
public function setHorarioIdHorario($var){
     $this->horario_id_horario=$var;
}
public function getHorarioIdHorario(){
	return $this->horario_id_horario;  
}
    
}
?>