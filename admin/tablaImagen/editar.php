<?php
session_start();
if ( $_SESSION["perfil"]!= "admin"){
    header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset ="utf-8">
<title>Editar Imagen</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="../assets/css/miestilo.css" rel="stylesheet" >
</head>
<body>

<header>

</header>
<aside>

<?php

echo "<nav class='navbar navbar-default'>";
echo "<div class='container-fluid'>";
echo "<div class='navbar-header'><a class='navbar-brand'>Actualizar Imagenes</a></div>";
echo "<ul class='nav navbar-nav'>";
echo "<li><a href='index.php'>Atrás</a></li>";
echo "<li><a href='crear.php'>Nuevo</a></li>";
echo "</ul>";
echo "<ul class='nav navbar-nav navbar-right'>";
echo "<li><a href='#'>Hola:(" . $_SESSION ['nombre'] . ")</a></li>";
echo "<li><a href='../../pages/logout.php''><span class='glyphicon glyphicon-log-in'></span> Salir</a></li>";
echo "</ul>";
echo "</div>";
echo "</nav>";

require_once("../../src/collectorImagen.php"); 
$objColl= new ImagenCollector();
$imagen= new Imagen ();

$id=$_GET['id'];
    
$imagen=$objColl->showImagen($id);

?>


<form method= "POST" class="form-horizontal" action= "#" enctype="multipart/form-data">
    <div class='form-group'>
	<label for='inputName' class='control-label col-xs-2'>Foto Guarderia:</label>
      <div class="col-xs-10">
         <input type="file" name="archivo" class="file mifile">
      </div>
    </div>


	<div class='form-group'>
	<label for='inputName' class='control-label col-xs-2'>Seleccione Guarderia</label>
      	<div class="col-xs-10">
        <select name="guarderia" required  class="form-control miselect">
  
      <?php
      
      require_once("../../src/collectorImagen.php");
      $objImg= new ImagenCollector();
      foreach ($objImg->guarderiaDisponibles() as $guarderia) {
        
       echo  "<option value='".$guarderia->getId()."'>".$guarderia->getNombre()." </option>";
      
      }
      ?>
        </select>
     </div>
</div>     
 
    <div class="form-group">
    
         <div class="col-xs-offset-2 col-xs-10">
             <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
     </div>
</form>

</aside>
</body>
<?php
if(isset($_POST["guarderia"])|| isset($_POST["archivo"])){

require_once("../../src/collectorImagen.php");
$dir_subida = "../../img/";
$fichero_subido = $dir_subida.basename($_FILES['archivo']['name']."");
$descripcion=$_SERVER_DOCUMENT['root']."img/".basename($_FILES['archivo']['name']."");

//$id=$_POST["archivo"];
$guarderia=$_POST["guarderia"];
echo '<pre>';
 if(move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido))  {
     $descripcion=$_SERVER_DOCUMENT['root']."img/".basename($_FILES['archivo']['name']."");
              
   
                 
 

    }else{
     $descripcion=$imagen->getDescripcion();
    }
  $objColle= new ImagenCollector();
  //$objColle->insertImagen($descripcion,4);
  $guarderia=$_POST['guarderia'];          
  $objColle->updateImagen($id,$descripcion, $guarderia);

    $mensaje="Edición correcta";
          echo "<meta http-equiv='refresh' content='0;URL=index.php?mensaje=$mensaje'>";      

    //print_r($_FILES);
   // print_r($_FILES['error']);

//if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
//copy($_FILES['archivo']['tmp_name'], '/var/www/html/practica/imagenes/'.$_FILES['archivo']['name'].'');
//}
}
?>
</html>
