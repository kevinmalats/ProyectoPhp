<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
if(isset($_POST)){
	require_once("../../src/collectorHorario.php"); 
$objColl= new HorarioCollector();
    
   $idActividad=$_POST["actividad"];
   

  $objColl->insertHorario($idActividad);
 header("location: crear.php?mensaje= Se creó exitosamente");
}
    
 ?>
