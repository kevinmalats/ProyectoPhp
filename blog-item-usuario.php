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

        <nav class="navbar navbar-inverse" role="banner">
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
                      
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.html">Blog Single</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">404</a></li>
                                <li><a href="shortcodes.html">Shortcodes</a></li>
                            </ul>
                        </li>-->
                        <?php
                            if ($_SESSION){
                        ?>
                            <li class="active" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Publicacion <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">                                
                                    <li><a href="blog.php">Ver</a></li>
                                    <li><a href="publicacionUsuario.php?mensaje=">Crear</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.php">Contáctenos</a></li>                           
                        <?php
                                if ($_SESSION["perfil"]=="admin"){
                        ?>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">                                
                                <li><a href="indexadministrativo.php"><strong> <?php echo $_SESSION["usu"];?> </strong> </a></li>
                                <li><a href="logout.php">Cerrar Sesión</a></li>
                            </ul>
                            </li>
                        <?php
                                }else{
                        ?>                            
                            
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">                                
                                <li><a title="Bienvenido" ><strong>Bienvenido:  </strong> <?php echo $_SESSION["usu"];?></a></li>
                                <li><a href="logout.php">Cerrar Sesión</a></li>
                            </ul>
                            </li>
                        <?php
                                }
                            }else{
                        ?>
                            <li><a href="login.php?mensaje=">Inicio de Sesión</a></li>
                        <?php
                            }
                        ?>          
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <?php 
        $id = $_GET["id"];
        require_once('publicacionCollector.php');
        require_once('comentarioCollector.php');
        require_once('usuarioCollector.php');
        $objeto = new publicacionCollector();
        $objet2 = new comentarioCollector(); 
        $c = $objeto->comprobarPublicacion($id);
        $nomb = $c->getNombre();
        $fech = $c->getFecha();           
        $titu = $c->getTitulo();
        $nomi = $c->getImagen();
        $diri = $c->getDirimg();
        $cont = $c->getContenido();
        $coun = $objeto->contarComentario($id);
        echo "<section id='blog' class='container'>";    
        echo "<div class='center'>";   
        echo "<h2>Publicacion</h2>";
        echo "</div>";
        echo "<div class='blog'>";
        echo "<div class='row'>";
        echo "<div class='col-md-8'>";
        echo "<div class='blog-item'>";
        echo "<img class='img-responsive img-blog' src=".$diri.$nomi." width='100%' alt='' />";
        echo "<div class='row'>";
        echo "<div class='col-xs-12 col-sm-2 text-center'>";
        echo "<div class='entry-meta'>";
        echo "<span id='publish_date'> $fech</span>";
        echo "<span><i class='fa fa-user'></i> $nomb</span>"; 
        echo "<span><i class='fa fa-user'></i> $coun comentarios</span>";
        echo "</div>";
        echo "</div>";
        echo "<div class='col-xs-12 col-sm-10 blog-content'>";          
        echo "<h2>$titu</h2>";                        
        echo "<p>$cont</p>";                    
        echo "<div class='post-tags'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";                                      
        echo "</div><!--/.blog-item-->";                        
        echo "<h1 id='comments_title'>$coun Commentario</h1>";
        foreach($objeto->comprobarComentarioPublicacion($id) as $a){            
            $idu = $a->getIdUsuario();   
            $fec = $a->getFecha();
            $cont = $a->getContenido();
            $objet3 = new usuarioCollector();    
            $usuario = $objet3->todaInfoID($idu);
            $nomusu = $usuario->getNombre();
            $diru = $usuario->getDirImg();
            $nomu = $usuario->getNomImg();        
            echo "<div class='media comment_section'>";
            echo "<div class='pull-left post_comments'>";
            echo "<img src=".$diru.$nomu." class='img-circle' alt='' /></a>";         
            echo "</div>";
            echo "<div class='media-body post_reply_comments'>";
            echo "<h3>$nomusu</h3>";
            echo "<h4>$fech</h4>";
            echo "<p>$cont</p>";
            echo "</div>";
            echo "</div>";
        }
        if ($_SESSION){
                $idco = $_SESSION["id"];
                echo"<div id='contact-page clearfix'>";
                echo"<div class='message_heading'>";            
                echo"<h4>Dejar una comentario</h4>";                
                echo"</div>";                       
                echo"<form class='contact-form' name='contact-form' method='post' action='subirComentario.php?idc=$idco&idp=$id'>";
                echo"<div class='row'>";
                echo"<div class='col-sm-7'>";
                echo"<div class='form-grou'>";
                echo"<label>Mensaje *</label>";
                echo"<textarea name='message' id='message' required class='form-control' rows='8'></textarea>";
                echo"</div>";                        
                echo"<div class='form-group'>";
                echo"<button type='submit' class='btn btn-primary btn-lg' required='required'>comentario</button>";
                echo"</div>";
                echo"</div>";
                echo"</div>";
                echo"</form>";     
                echo"</div><!--/#contact-page-->";        
            }
    
                    echo "</div><!--/.col-md-8-->";                

            echo "</div><!--/.row-->";

         echo "</div><!--/.blog-->";

    echo "</section><!--/#blog-->";
    ?>
    


    <footer id="footer" class="midnight-blue">
            <div class="container">
                <div class="row">
                      <div class="col-sm-6">
                    &copy; 2018 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Camarón Latino</a>. Todos los derechos reservados
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