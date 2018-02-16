<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorActividad.php"); 
$objColl= new ActividadCollector();
$id=$_GET["id"];
$objColl->deleteActividad($id);
header("location:index.php?mensaje=Actividad borrado correctamente");
