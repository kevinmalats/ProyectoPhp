<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Contactenos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="php" content="proyecto_pws">
	<link href="../css/bootstrap-responsive.css" rel="stylesheet">  
	<!---estilo de colores -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- efectos -->
	<link href="../color/default.css" rel="stylesheet">
	<link rel="shortcut icon" href="../img/icono.gif">
	
</head>

<body>
	<!-- navbar -->
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
							<li><a title="Guarderías" href="guarderias.php">Guarderías</a></li>
							<li><a title="blog" href="blog.php">Blog</a></li>
							<li><a title="contactenos" href="contactenos.php">Contáctenos</a></li>
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

						</ul>					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->
	
	<!-- spacer section -->
	
	<!-- end spacer section -->
	<!-- section: team -->
	<section id="contact" class="section green">
		<div class="container">
			<h4 id="titulo">Mantente en Contacto</h4>
			<p>
				Envíanos tus comentarios y/o sugerencias a nuestro portal, nosotros nos comunicaremos contigo de manera inmediata, no olvides dejarnos tus datos para hacerlo.
                Si tienes alguna pregunta en cuestión, puedes contactar con nosotros también por este medio.
                Estamos para atender tus dudas!!!.
			</p>
			<div class="blankdivider30">
			</div>
			<div class="row">
				<div class="span12">
					<div class="cform" id="contact-form">
						<div id="sendmessage">Tu mensaje ha sido enviado. Gracias!</div>
						<div id="errormessage"></div>
						<form action="non-empty" method="post" class="contactForm">
							<div class="row">
								<div class="span6">
									<div class="field your-name form-group">
										<input type="text" name="name" class="form-control" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="ingresar información" />
										<div class="validation"></div>
									</div>
									<div class="field your-email form-group">
										<input type="text" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="ingresar información" />
										<div class="validation"></div>
									</div>
									<div class="field subject form-group">
										<input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="ingresar información" />
										<div class="validation"></div>
									</div>
								</div>
								<div class="span6">
									<div class="field message form-group">
										<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="ingresar información" placeholder="Mensaje"></textarea>
										<div class="validation"></div>
									</div>
									<input type="submit" value="Enviar Mensaje" class="btn btn-theme pull-left">
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- ./span12 -->
			</div>
		</div>
	</section>
	
	<!-- end spacer section -->
	<!-- section: blog -->
	

	<!-- end spacer section -->
	<!-- section: contact -->

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
