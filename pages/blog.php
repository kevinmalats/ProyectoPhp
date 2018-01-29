<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Blog</title>
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
							<li><a title="Quines Somos" href="quienes_somos.php">Acerca de</a></li>
							<li><a title="servicios" href="Servicios.php">Servicios</a></li>
							<li><a title="Guarderías" href="guarderias.php">Guarderías</a></li>
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
	<!-- Header area -->
	<!-- end spacer section -->
	<!-- section: blog -->
	<section id="blog" class="section">
		<div class="container">
			<h4 id="titulo">Nuestro Blog</h4>
			<!-- Three columns -->
			<div class="row">
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="../img/blog/seguridad.jpg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">Mayo 6, 2017</span>
						</div>
						<div class="entry-content">
							<h5><strong><a>Seguridad en las guarderías</a></strong></h5>
							<p>
								¿Sabemos con seguridad quienes se quedan con nuestros hijos?. &hellip;
							</p>
							<a href="#" class="more">Leer mas</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="../img/blog/ni%C3%B1era.jpg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">Junio 19, 2017</span>
							
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">¿Guardería o Niñera?</a></strong></h5>
							<p>
								¿Cuando debemos considerar contratar niñera o acudir a una guarderia?. &hellip;
							</p>
							<a href="#" class="more">Leer más</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="../img/blog/seguridadcc.jpeg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">Julio 22, 2017</span>
							
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">Seguridad en Centros Comerciales</a></strong></h5>
							<p>
								¿Son en verdad seguros, los juegos para niños/as en los CC.? &hellip;
							</p>
							<a href="#" class="more">Leer mas</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="../img/blog/padres-solteros-2.jpg" alt="" />
						</div>
						<div class="post-meta">
							<i class="icon-file icon-2x"></i>
							<span class="date">Agosto 27, 2017</span>
							
						</div>
						<div class="entry-content">
							<h5><strong><a href="#">Padres Solteros, ¿existen?</a></strong></h5>
							<p>
								¿Cuánto conocemos de la realidad en crianza de bebes, en nuestro país? &hellip;
							</p>
							<a href="#" class="more">Leer mas</a>
						</div>
					</div>
				</div>
			</div>
			<div class="blankdivider30"></div>
			
            <!-- comentario
            <div class="aligncenter">
				<a href="#" class="btn btn-large btn-theme">More blog post</a>
			</div>
            -->
            
		</div>
	</section>

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
