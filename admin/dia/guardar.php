<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
if(isset($_POST)){
	require_once("../../src/collector_dia.php"); 
$objColl= new DiaCollector();
    
   $nombre=$_POST["nombre"];
   $hora_inicio=$_POST["hora_inicio"];
   $hora_fin=$_POST["hora_fin"];
   $horario_id_horario=$_POST["horario_id_horario"];

  $objColl->insertDia($nombre, $hora_inicio, $hora_fin, $horario_id_horario);
 header("location: crear.php?mensaje= Se creó exitosamente");
}
    
 ?>