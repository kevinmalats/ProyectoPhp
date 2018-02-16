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
<title>Editar Registro de Personal de Guarderia</title>
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
echo "<div class='navbar-header'><a class='navbar-brand'>Actualizar Registro de Personal de Guarderia</a></div>";
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

require_once("../../src/collectorPersonalGuarderia.php"); 
$objColl= new PersonalGuarderiaCollector();
$personal_guarderia= new PersonalGuarderia ();

$id=$_GET['id'];
    
$personal_guarderia=$objColl->showPersonalG($id);

?>

<form method= "POST" class="form-horizontal" action= "#" >
   
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Nombres:</label>
         <div class="col-xs-10">
             <input name = "nombres" type="text" id= "nombres" class="form-control misopciones"
                value="<?php echo $personal_guarderia->getNombres();?>"  />
         </div>
     </div>
    
    <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Apellidos:</label>
         <div class="col-xs-10">
             <input name = "apellidos" type="text" id= "apellidos" class="form-control misopciones"
                value="<?php echo $personal_guarderia->getApellidos();?>"  />
         </div>
     </div>
    
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Cargo:</label>
         <div class="col-xs-10">
             <input name = "cargo" type="text" id= "cargo" class="form-control misopciones"
                value="<?php echo $personal_guarderia->getCargo();?>"  />
         </div>
     </div>
    
     <div class='form-group'>
        <label for='inputName' class='control-label col-xs-2'>Seleccione Guarderia</label>
            <div class="col-xs-10">
                <select name="guarderia_id_guarderia" type="text" id= "guarderia_id_guarderia" required  class="form-control miselect">
  
        <?php
      
        require_once("../../src/collectorGuarderia.php");
        $obUsua= new GuarderiaCollector();
        foreach ($obUsua->ShowGuarderia() as $guarderia) {
        
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
if(isset($_POST["nombres"])|| isset($_POST["apellidos"]) || isset($_POST["cargo"]) || isset($_POST["guarderia_id_guarderia"])){
   
    $nombresnuevo=$_POST["nombres"];
    $apellidosnuevo= $_POST["apellidos"];
    $cargonuevo=$_POST["cargo"];
    $guarderia_id_guarderianuevo= $_POST["guarderia_id_guarderia"];
    $objColl->updatePersonalGuarderia($id,$nombresnuevo, $apellidosnuevo, $cargonuevo, $guarderia_id_guarderianuevo);
    $mensaje="Edición correcta";
          echo "<meta http-equiv='refresh' content='0;URL=index.php?mensaje=$mensaje'>";
}
?>
</aside>
</body>
</html>