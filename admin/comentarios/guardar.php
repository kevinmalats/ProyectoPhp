<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
if(isset($_POST)){
	require_once("../../src/collectorComentario.php"); 
$objColl= new ComentarioCollector();
    
   $comentario=$_POST["comentario"];
   $usuario=$_POST["usuario"];
  $guarderia=$_POST["guarderia"];

  $objColl->insertComentario($comentario, $usuario, $guarderia);
header("location: crear.php?mensaje= Se creó exitosamente");
}  
    
 ?>