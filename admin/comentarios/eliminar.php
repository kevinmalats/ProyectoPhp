<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
require_once("../../src/collectorComentario.php"); 
$objColl= new ComentarioCollector();
$id=$_GET["id"];
$objColl->deleteComentario($id);
header("location:index.php?mensaje=Comentario borrado correctamente");