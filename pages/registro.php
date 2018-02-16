<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Registrate</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="php" content="proyecto_pws">
	<link href="../css/miestilo.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.css" rel="stylesheet">  
	<!---estilo de colores -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- efectos -->
	<link href="../color/default.css" rel="stylesheet">

	<link rel="shortcut icon" href="../img/icono.gif">

	<!-- links bootstrap para subida de archivos¡-->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

 
	
</head>
<body>
	<div class="navbar-wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<!-- Responsive navbar -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
					<a href="../index.php"><img src="../img/logo.gif" class="logotipo" alt=""></a>
                    
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
							<li><a title="Quienes Somos" href="quienes_somos.php">Acerca de</a></li>
							<li><a title="Servicios" href="Servicios.php">Servicios</a></li>
							<li><a title="Guarderías" href="guarderias.php">Guarderías</a></li>
							<li><a title="Blog" href="blog.php">Blog</a></li>
							<li><a title="Contactenos" href="contactenos.php">Contáctenos</a></li>
						</ul>
                      	<ul id="menu-main" class="nav navbar-nav navbar-right">	
                       <?php
						
							
						if ($_SESSION){
                         $fotoperfil=$_SESSION['fotoperfil'];
                       
						?>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle midrop" data-toggle="dropdown">
                          <img alt="" class="loat-left imagenPerfil" src="../<?php echo  $fotoperfil;?>">
                            <span class="dropdown-caret"></span> <b class="caret"></b>
                         </a>
						
						<ul class="dropdown-menu mistyle">
						
						<li class="dropdown-header"><a href="#">
                         Logeado como <br><strong class=""><?php echo $_SESSION['nombre'];?></strong>
                          </a></li>
                          <li><a title ="Logout" href="logout.php">Logout</a></li>
						
						
                         <?php
							if ( $_SESSION["perfil"]=="admin"){
								?>
							
                          <li><a title="Administrar" href="../admin/index.php">Administrar</a></li>
						    <?php
					    }
					 }else{
						?>
						<li><a title ="Login" href="login.php">Login</a></li> 

						<?php
					}
					?>
                    </ul>
                   
           

                    </li>

						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- multistep form -->
<div>
<form id="msform" action="../src/util/registrarUsuario.php" method="post" enctype="multipart/form-data">
  <!-- progressbar -->
    
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Crea tu cuenta</h2>
    <input type="text" name="usuario" placeholder="Usuario" />
    <input type="password" name="password" placeholder="Contraseña" />
   <select name="perfil" required  class="form-control selectregistro">
          <option selected="true" disabled="disabled">Seleccione el perfil </option>
         <option value="admin">Admin</option> 
         <option value="padre">Padre</option>
        
         
      </select>
 
    <h2 id="infopersonal" class="fs-title">Información Personal</h2>
     <input type="text" name="correo" placeholder="Correo" />
    <input type="text" name="nombres" placeholder="Nombres" />
    <input type="text" name="apellidos" placeholder="Apellidos" />
   
      <div class="col-xs-10">
       <input type="file" name="archivo" class="mifile" >
             <!--<input name = "fotoperfil" type="text" id= "fotoperfil" class="form-control misopciones"
 placeholder="Fotoperfil"  required/> -->
      
      </div>
         

    <input type="text" name="telefono" placeholder="Telefono" />
    <textarea name="direccion" placeholder="Dirección"></textarea>
    <input type="submit" name="submit" class="submit action-button" value="Enviar" />
  </fieldset>
  <?php
	if($_GET["mensaje"]){
		if($_GET["mensaje"]== "No deje campos vacios"){
			
		}else{
			
		}
		?>
 <div class="col-md-5 text-center mensaje"><p><?php echo $_GET["mensaje"];?></p></div>
		<?php
	}

?>
</form>

    </div>
	
   
	<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
    </body>
     <footer>
		<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="http://www.instagram.com"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
						<li><a href="http://www.twitter.com"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
					</ul>
                   <p class="copyright"></p>
					  Safe DayCare. Todos los Derechos Reservados.
					<p></p>	
                    <div class="credits">
							<p>Monitoreo y Seguridad  </p> 
				    </div>
				</div>
			</div>
        </div>
		
	</footer>
</html>
