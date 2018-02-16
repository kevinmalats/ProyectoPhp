<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
  header("location: ../index.php");
}
if(isset($_POST)){
	require_once("../../src/collectorInformacionUsuario.php"); 
$objColl= new InformacionUsuarioCollector();
$dir_subida = "../../img/perfil/";
$fichero_subido = $dir_subida.basename($_FILES['archivo']['name']."");
$fotoperfil=$_SERVER_DOCUMENT['root']."img/perfil/".basename($_FILES['archivo']['name']."");

echo '<pre>';
if(move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido))  {
                             
   
   //  header("location: crear.php?mensaje= Se creó exitosamente");
 } else{
      if($fotoperfil=="img/perfil/"){
      $fotoperfil="img/perfil/anonimo2.jpg";
    }
   
 }
 $nombres=$_POST["nombres"];
   $apellidos=$_POST["apellidos"];
   $correo=$_POST["correo"];
   $id_usuario=$_POST["usuario"];
   $direccion=$_POST["direccion"];
  $objColl->insertInfoUsuario($nombres, $apellidos,$fotoperfil ,$correo,$id_usuario,$direccion);
   echo "<meta http-equiv='refresh' content='0;URL= crear.php?mensaje= Se creó exitosamente'>";
}   
 ?>