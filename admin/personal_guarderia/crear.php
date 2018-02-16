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
<title>Agregar Personal de Guarderias</title>
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


<section>
</section>
<section>

</section>
<aside>
<?php

 echo "<nav class='navbar navbar-default'>";
    echo "<div class='container-fluid'>";
    echo "<div class='navbar-header'><a class='navbar-brand' >Tabla de Personal de Guarderías</a></div>";
    echo " <ul class='nav navbar-nav'>";
                echo "<li><a href='index.php'>Atrás</a></li>";
            echo "<li><a href='#'>Nuevo</a></li>";
        echo "</ul>";
    echo " <ul class='nav navbar-nav navbar-right'>";
    echo "<li><a href='#'>Hola Usuario : (" . $_SESSION ['nombre'] . ")</a></li>";
    echo "<li><a href='../salir.php''><span class='glyphicon glyphicon-log-in'></span> Salir</a></li>";
    echo "</ul>";
    echo "</div>";
    echo "</nav>";

?>

<form method= "POST" class="form-horizontal" action= "guardar.php" >
 

    <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Nombres:</label>
         <div class="col-xs-10">
             <input name = "nombres" type="text" id= "nombres" class="form-control misopciones"
                placeholder="nombres"  required/>
         </div>
     </div>
    
    <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Apellidos:</label>
         <div class="col-xs-10">
             <input name = "apellidos" type="text" id= "apellidos" class="form-control misopciones"
                placeholder="apellidos"  required/>
         </div>
     </div>
    
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Cargo:</label>
         <div class="col-xs-10">
             <input name = "cargo" type="text" id= "cargo" class="form-control misopciones"
                placeholder="cargo"  required/>
         </div>
     </div>
    
    <!--
    <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Código Guarderia:</label>
         <div class="col-xs-10">
             <input name = "guarderia_id_guarderia" type="text" id= "guarderia_id_guarderia" class="form-control misopciones"
                placeholder="guarderia_id_guarderia"  required/>
         </div>
     </div>
    -->
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


</aside>

<?php
if(isset($_GET["mensaje"])){
    ?>
    <div class="col-md-5 text-center"><?php echo $_GET["mensaje"];?></div>
        
    <?php
}
?>
    </aside>
</body>
</html>