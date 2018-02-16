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
<title>Editar Horario</title>
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
echo "<div class='navbar-header'><a class='navbar-brand'>Actualizar Horario</a></div>";
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

require_once("../../src/collectorHorario.php"); 
$objColl= new HorarioCollector();
$horario= new Horario ();

$id=$_GET['id'];
    
$horario=$objColl->showHorarios($id);

?>


<form method= "POST" class="form-horizontal" action= "#" >
    
 	<div class='form-group'>
	<label for='inputName' class='control-label col-xs-2'>Seleccione Actividad</label>
      	<div class="col-xs-10">
        <select name="actividad" required  class="form-control miselect">
  
      <?php
 
     require_once("../../src/collectorHorario.php");
      $objAct= new HorarioCollector();
      foreach ($objAct->ActividadDisponibles() as $actividad) {
        echo $actividad->getDescripcion();
       echo  "<option value='".$actividad->getId()."'>".$actividad->getDescripcion()." </option>";
      
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


<?php
if(isset($_POST["actividad"]) ){
   
 
    $actividadnuevo=$_POST["actividad"];
    $objColl->updateHorario($id,$actividadnuevo);
    $mensaje="Edición correcta";
          echo "<meta http-equiv='refresh' content='0;URL=index.php?mensaje=$mensaje'>";
  

}
?>
</aside>
</body>
</html>
