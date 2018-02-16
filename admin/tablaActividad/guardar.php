<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}

if(isset($_POST)){
	require_once("../../src/collectorActividad.php"); 
$objColl= new ActividadCollector();
    
   $descripcion=$_POST["descripcion"];
   $guarderia=$_POST["guarderia"];

  $objColl->insertActividad($descripcion, $guarderia);
 header("location: crear.php?mensaje= Se creó exitosamente");
}
    
 ?>
