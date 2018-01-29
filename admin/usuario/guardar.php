<?php

if(isset($_POST)){
	require_once("../../src/collectorUsuario.php"); 
$objColl= new UsuarioCollector();
    
   $nombre=$_POST["nombre"];
   $password=$_POST["password"];
   $perfil=$_POST["perfil"];

  $objColl->insertUsuario($nombre, $password, $perfil);
header("location: crear.php?mensaje= Se creó exitosamente");
}  
    
 ?>