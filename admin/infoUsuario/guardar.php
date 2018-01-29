<?php

if(isset($_POST)){
	require_once("../../src/collectorInformacionUsuario.php"); 
$objColl= new InformacionUsuarioCollector();
    
   $nombres=$_POST["nombres"];
   $apellidos=$_POST["apellidos"];
   $correo=$_POST["correo"];
   $id_usuario=$_POST["usuario"];
   $direccion=$_POST["direccion"];
   $fotoperfil=$_POST["fotoperfil"];
  $objColl->insertInfoUsuario($nombres, $apellidos,$fotoperfil ,$correo,$id_usuario,$direccion);
    header("location: crear.php?mensaje= Se creó exitosamente");
}
    
 ?>