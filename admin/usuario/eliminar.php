<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorUsuario.php"); 
$objColl= new UsuarioCollector();
$id=$_GET["id"];
$objColl->deleteUsuario($id);
header("location:index.php?mensaje=Usuario borrado correctamente");