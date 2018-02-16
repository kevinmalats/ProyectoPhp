<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
if(isset($_POST)){
	require_once("../../src/collectorCiudad.php"); 
$objColl= new CiudadCollector();
    
   $nombre=$_POST["nombre"];

  $objColl->insertCiudad($nombre);
header("location: crear.php?mensaje= Se creó exitosamente");
}  
    
 ?>