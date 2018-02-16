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
<title>Editar Usuario</title>
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
echo "<div class='navbar-header'><a class='navbar-brand'>Actualizar Usuario</a></div>";
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

require_once("../../src/collectorUsuario.php"); 
$objColl= new UsuarioCollector();
$usuario= new Usuario ();

$id=$_GET['id'];
    
$usuario=$objColl->showUsuario($id);

?>

<form method= "POST" class="form-horizontal" action= "#" >
   
     <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Usuario:</label>
         <div class="col-xs-10 misopciones">
             <input name = "nombre" type="text" id= "usuario" class="form-control" 
                value="<?php echo $usuario->getNombre();?>" autofocus />
         </div>
     </div>
  
    <div class="form-group">
         <label for="inputName" class="control-label col-xs-2">Contraseña:</label>
         <div class="col-xs-10">
             <input name = "password" type="text" id= "contrasenia" class="form-control misopciones"
                value="<?php echo $usuario->getPassword();?>"  />
         </div>
     </div>
     
<div class='form-group'>
<label for='inputName' class='control-label col-xs-2'>Perfil:</label>
      <select name="perfil" required  class="form-control miselect">
          <option  disabled="disabled">Seleccione el perfil </option>
         <?php
            if($usuario->getPerfil()== "admin"){
              ?>
              <option selected="true" value="admin">Admin</option>
               <option  value="padre">Padre</option>
              <?php  
            }else
            {
                ?>
                <option value="admin">Admin</option>
                <option selected="true" value="padre">Padre</option>
                <?php
            }
         ?>
 
      </select>
</div>
    <div class="form-group">
    
         <div class="col-xs-offset-2 col-xs-10">
             <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
     </div>
</form>


<?php
if(isset($_POST["nombre"])|| isset($_POST["password"]) || isset($_POST["perfil"])){
   
    $nombrenuevo=$_POST["nombre"];
    $passwordnuevo= $_POST["password"];
    $perfilnuevo= $_POST["perfil"];
    if($objColl->updateUsuario($id,$nombrenuevo, $passwordnuevo, $perfilnuevo)){
          $mensaje="Edición correcta";
          echo "<meta http-equiv='refresh' content='0;URL=index.php?mensaje=$mensaje'>";
    }else{
      $mensaje= "Usuario ya existente, utlice otro nombre de usuario";
      echo "<p>$mensaje</p>";
    
    }
  
  

}
?>
</aside>
</body>
</html>