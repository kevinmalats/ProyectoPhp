<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorInformacionUsuario.php"); 
$objColl= new InformacionUsuarioCollector();
$id=$_GET["id"];
$objColl->deleteInfoUsuario($id);
header("location:index.php?mensaje=Usuario borrado correctamente");