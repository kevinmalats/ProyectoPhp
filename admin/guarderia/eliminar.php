<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorGuarderia.php"); 
$objColl= new GuarderiaCollector();
$id=$_GET["id"];
$objColl->deleteGuarderia($id);
header("location:index.php?mensaje=Guarderia borrada correctamente");
