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
<title>Editar Dirección</title>
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
echo "<div class='navbar-header'><a class='navbar-brand'>Actualizar Dirección</a></div>";
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

require_once("../../src/collectorDireccion.php"); 
$objColl= new DireccionCollector();
$usuario= new Direccion ();

$id=$_GET['id'];
    
$direccion=$objColl->showDireccion($id);

?>

<form method= "POST" class="form-horizontal" action= "#" >
   
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Dirección:</label>
         <div class="col-xs-10 misopciones">
             <input name = "descripcion" type="text" id= "descripcion" class="form-control" value="<?php echo $direccion->getDescripcion();?>" autofocus required/>
         </div>
     </div>
      <label for="inputName" class="control-label col-xs-2">Guardería:</label>
    <select name="guarderia" required  class="form-control miselect">
  
      <?php
       

      require_once("../../src/collectorDireccion.php");
      $obUsua= new DireccionCollector();
      $guarderia=$obUsua->direccionxGuarderia($id);
      echo  "<option value='".$guarderia->getId()."'>".$guarderia->getNombre()." </option>";
      
      foreach ($obUsua->guardeiasDisponibles() as $guarderia) {
       echo  "<option value='".$guarderia->getId()."'>".$guarderia->getNombre()." </option>";
      
      }
      ?>
        </select>
     
<div class='form-group'>

     <div class="form-group">
    
         <div class="col-xs-offset-2 col-xs-10">
             <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
     </div>
</form>


<?php
if(isset($_POST["descripcion"])){
   
    $nombrenuevo=$_POST["descripcion"];
     $guarderianuevo=$_POST["guarderia"];
    $objColl->updateDireccion($id,$nombrenuevo,$guarderianuevo);
          $mensaje="Edición correcta";
          echo "<meta http-equiv='refresh' content='0;URL=index.php?mensaje=$mensaje'>";
}
?>
</aside>
</body>
</html>