<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
if(isset($_POST)){
	require_once("../../src/collectorGuarderia.php"); 
$objColl= new GuarderiaCollector();
    
   $nombre=$_POST["nombre"];
   $ciudad_id_ciudad=$_POST["ciudad_id_ciudad"];

  $objColl->insertGuarderia($nombre, $ciudad_id_ciudad);
 header("location: crear.php?mensaje= Se creó exitosamente");
}
    
 ?>