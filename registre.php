<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Blog Solo | Camarón Latino</title>
    
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/propio.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

    <header id="header">
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                </div>
                
                 <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Inicio</a></li>
                        <li><a href="about-us.php">Nosotros</a></li>
                        <li><a href="servicios.php">Servicios</a></li>
                        <li><a href="productos.php">Productos</a></li> 
                        
                            <?php
                                if ($_SESSION){
                            ?>
                                <li><a href="contact-us.php">Contáctenos</a></li> 
                                <li><a href="logout.php">Cerrar Sesión</a></li>
                            <?php
                                    if ($_SESSION["perfil"]=="admin"){
                            ?>
                                <li><a href="indexadministrativo.php"><strong>Bienvenido:  </strong> <?php echo $_SESSION["usu"];?></a></li>
                            <?php
                                    }else{
                            ?>
                                <li><a title="Bienvenido" ><strong>Bienvenido:  </strong> <?php echo $_SESSION["usu"];?></a></li>
                            <?php
                                    }
                                }else{
                            ?>
                                <li class="active"><a href="login.php?mensaje=">Inicio de Sesión</a></li>
                            <?php
                                }
                            ?>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
    <section id="tamasec"><h2 class="center2">Registro</h2>
        <?php
         if($_GET["mensaje"]){
        ?>
              <div class="text-center"><p><?php echo $_GET["mensaje"];?></p></div>
        <?php
         }
        ?>
        <div class="containerlogin">
            <div class="card card-register mx-auto mt-5">
              <div class="card-header">Registro de cuenta</div>
              <div class="card-body">
                <form action="crearUsuarioGeneral.php" method="post">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label>Nombre</label>
                        <input class="form-control" placeholder="" name="nom">
                      </div>
                      <div class="col-md-6">
                        <label>Cédula/RUC</label>
                        <input class="form-control" placeholder="" name="ced">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label>Telefono</label>
                        <input class="form-control"  placeholder="" name="tel">
                      </div>
                      <div class="col-md-6">
                        <label>Correo electrónico</label>
                        <input class="form-control" type="email" placeholder="" name="cor">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Dirección</label>
                    <input class="form-control" placeholder="" name="dir">
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-6">
                        <label>Usuario</label>
                        <input class="form-control" type="text" placeholder="" name="usu">
                      </div>
                      <div class="col-md-6">
                        <label>Contraseña</label>
                        <input class="form-control"  type="text" placeholder="" name="con">
                      </div>
                    </div>
                  </div>
                     <button class="btn btn-primary btn-block" type="submit"> Registrar </button>
                </form>
                <div class="text-center">
                  <a class="d-block small mt-3" href="login.php?mensaje=">Inicio de Sesión</a>
                </div>
              </div>
            </div>
          </div>
    </section>     
    
    <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                      <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. Todos los Derechos Reservados.
                </div>
                   
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>