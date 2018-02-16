<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorTelefono.php"); 
$objColl= new TelefonoCollector();
$id=$_GET["id"];
$objColl->deleteTelefono($id);
header("location:index.php?mensaje=Teléfono borrado correctamente");