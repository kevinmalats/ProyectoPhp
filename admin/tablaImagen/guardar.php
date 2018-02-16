<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
	header("location: ../index.php");
}
// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar
// de $_FILES.
require_once("../../src/collectorImagen.php");
$dir_subida = "../../img/";
$fichero_subido = $dir_subida.basename($_FILES['archivo']['name']."");
$descripcion=$_SERVER_DOCUMENT['root']."img/".basename($_FILES['archivo']['name']."");

echo '<pre>';
if(move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido))  {
                                         
  

    }else{
      $descripcion="img/";

    }
  $objColle= new ImagenCollector();
  $guarderia=$_POST['guarderia'];
  $objColle->insertImagen($descripcion,$guarderia);
  echo "<meta http-equiv='refresh' content='0;URL= crear.php?mensaje= Se creó exitosamente'>";
   // print_r($_FILES);
    //print_r($_FILES['error']);

//if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
//copy($_FILES['archivo']['tmp_name'], '/var/www/html/practica/imagenes/'.$_FILES['archivo']['name'].'');
//}
?>
