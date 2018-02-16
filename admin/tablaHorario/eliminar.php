<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorHorario.php"); 
$objColl= new HorarioCollector();
$id=$_GET["id"];
$objColl->deleteHorario($id);
header("location:index.php?mensaje=Actividad borrado correctamente");
