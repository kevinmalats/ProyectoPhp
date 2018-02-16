<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorDireccion.php"); 
$objColl= new DireccionCollector();
$id=$_GET["id"];
$objColl->deleteDireccion($id);
header("location:index.php?mensaje=Dirección borrado correctamente");