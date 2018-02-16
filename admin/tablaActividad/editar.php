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
<title>Editar Actividad</title>
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
echo "<div class='navbar-header'><a class='navbar-brand'>Actualizar Actividad</a></div>";
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

require_once("../../src/collectorActividad.php"); 
$objColl= new ActividadCollector();
$actividad= new Actividad ();

$id=$_GET['id'];
    
$actividad=$objColl->showActividades($id);

?>


<form method= "POST" class="form-horizontal" action= "#" >
    
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Descripción:</label>
         <div class="col-xs-10">
             <input name = "descripcion" type="text" id= "descripcion" class="form-control misopciones"
                 value="<?php echo $actividad->getDescripcion();?>" />
         </div>
     </div>
  



	<div class='form-group'>
	<label for='inputName' class='control-label col-xs-2'>Seleccione Guarderia</label>
      	<div class="col-xs-10">
        <select name="guarderia" required  class="form-control miselect">
  
      <?php
      
      require_once("../../src/collectorActividad.php");
      $objAct= new ActividadCollector();
      foreach ($objAct->guarderiaDisponibles() as $guarderia) {
       echo $guarderia->getNombre();
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


<?php
if(isset($_POST["descripcion"])|| isset($_POST["guarderia"]) ){
   
 
    $descripcionnuevo=$_POST["descripcion"];
    $guarderianuevo= $_POST["guarderia"];
    $objColl->updateActividad($id,$descripcionnuevo, $guarderianuevo);
    $mensaje="Edición correcta";
          echo "<meta http-equiv='refresh' content='0;URL=index.php?mensaje=$mensaje'>";
  

}
?>
</aside>
</body>
</html>
