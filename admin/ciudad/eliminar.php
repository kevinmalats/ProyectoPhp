<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorCiudad.php"); 
$objColl= new CIudadCollector();
$id=$_GET["id"];
$objColl->deleteCIudad($id);
header("location:index.php?mensaje=Usuario borrado correctamente");