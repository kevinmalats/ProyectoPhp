<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Registro de Guarderia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="php" content="proyecto_pws">
    
  <!---estilo de colores -->
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../color/default.css" rel="stylesheet">
    <!--- efectos -->
    <link href="../css/estilo-guarderia.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icono.gif">
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
							<li><a title="servicios" href="Servicios.php">Servicios</a></li>
							<li><a title="Guarderias" href="guarderias.php">Guarderías</a></li>
							<li><a title="blog" href="blog.php">Blog</a></li>
							<li><a title="contactenos" href="contactenos.php">Contáctenos</a></li>
						<?php
						
									
						if ($_SESSION){
						?>
						<li><a title ="Logout" href="logout.php">Logout</a></li>
						     <?php
							if ( $_SESSION["perfil"]=="admin"){
								?>
                          <li><a title="Administrar" href="../admin/index.php"><strong>Bienvenido:  </strong> <?php echo $_SESSION['nombre'];?></a></li>
						    <?php
					    }else{
					    	?>
					    	 <li class="noHover"><a title="Bienvenido" ><strong>Bienvenido:  </strong> <?php echo $_SESSION['nombre'];?></a></li>
					    	<?php
					    }
						}else{
						?>
						<li><a title ="Login" href="login.php">Login</a></li>
					<?php
					}
					?>



						</ul>
					</nav>
        </div>
      </div>
    </div>
  </div>

  
<div id="bg">

  <div class="module">
    
    <div class="container"><h2> Registrando Guarderia</h2></div>
    <form class="form">
      <input type="text" placeholder="Nombre de guarderia" class="textbox" />
      <input type="text" placeholder="Ciudad" class="textbox" />
      <input type="text" placeholder="Direccion" class="textbox" />
      <input type="text" placeholder="Telefono" class="textbox" />
      <input type="button" value="Guardar" class="button-guarderia" />
    </form>
  </div>
</div>

    <footer>
		<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="http://www.instagram.com"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
						<li><a href="http://www.twitter.com"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
					</ul>
					<p class="copyright"></p>
						&copy; Safe DayCare. Todos los Derechos Reservados.
					<p></p>	
                    <div class="credits">
							<p>Monitoreo y Seguridad  </p> 
				    </div>
				</div>
			</div>
        </div>
	</footer>

	<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.scrollTo.js"></script>
	<script src="../js/jquery.nav.js"></script>
	<script src="../js/jquery.localScroll.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery.prettyPhoto.js"></script>
	<script src="../js/isotope.js"></script>
	<script src="../js/jquery.flexslider.js"></script>
	<script src="../js/inview.js"></script>
	<script src="../js/animate.js"></script>
	<script src="../js/custom.js"></script>
	<script src="../contactform/contactform.js"></script>
</body>
</html>
