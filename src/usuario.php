<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
class Usuario {

private $id_usuario;
private $nombre ;
private $password;
private $perfil;
private $ciudad_id_ciudad;

public function __construct(){
   

}
public function setId($id_usuario){
     $this->id_usuario=$id_usuario;
}
public function getId(){
	return $this->id_usuario;
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
public function setCiudad($var){
     $this->ciudad_id_ciudad=$var;
}
public function getCiudad(){
    return $this->ciudad_id_ciudad;
}


}

?>