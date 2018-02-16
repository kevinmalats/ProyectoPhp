<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collector_dia.php"); 
$objColl= new DiaCollector();
$id=$_GET["id"];
$objColl->deleteDia($id);
header("location:index.php?mensaje=Dia borrado correctamente");