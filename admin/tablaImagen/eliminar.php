<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorImagen.php"); 
$objColl= new ImagenCollector();
$id=$_GET["id"];
$objColl->deleteImagen($id);
header("location:index.php?mensaje=Imagen borrado correctamente");
