<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorPersonalGuarderia.php"); 
$objColl= new PersonalGuarderiaCollector();
$id=$_GET["id"];
$objColl->deletePersonalGuarderia($id);
header("location:index.php?mensaje=Registro de Personal borrado correctamente");