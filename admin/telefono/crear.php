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
<title>Crear Teléfono</title>
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
    echo "<div class='navbar-header'><a class='navbar-brand' >Tabla Teléfono</a></div>";
    echo " <ul class='nav navbar-nav'>";
                echo "<li><a href='index.php'>Menú</a></li>";
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
         <label for="inputName" class="control-label col-xs-2">Teléfono:</label>
         <div class="col-xs-10 misopciones">
             <input name = "descripcion" type="text" id= "id_telefono" class="form-control" placeholder="Teléfono" autofocus required/>
         </div>
     </div>
     <div class='form-group'>
<label for='inputName' class='control-label col-xs-2'>Seleccione Usuario</label>
      <div class="col-xs-10">
        <select name="usuario" required  class="form-control miselect">
  
      <?php
      
      require_once("../../src/collectorInformacionUsuario.php");
      $obUsua= new InformacionUsuarioCollector();
      foreach ($obUsua->showInfoUsuarios() as $usuario) {
      
       echo  "<option value='".$usuario->getId()."'>".$usuario->getNombres()." </option>";
      
      }
      ?>
        </select>
        <label ><a href="../infoUsuario/crear.php">Crear Usuario</a></label>
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
    <div class="col-md-5 text-center"><p><?php echo $_GET["mensaje"];?></p></div>
        
    <?php
}
?>
    </aside>
</body>
</html>
