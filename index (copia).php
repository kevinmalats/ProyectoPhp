<?php

?>
</!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scle=1.0">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/miestilo.css">

  

</head>
<body>
 <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Sign in</a></li>
        </ul>
  </div>
<div class="container">
<br>
<div class="col-md-12">
	<div id="carousel-1" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-1" data-slide-to="0" class="active" ></li>
			<li data-target="#carousel-1" data-slide-to="1" ></li>
			<li data-target="#carousel-1" data-slide-to="2" ></li>
		</ol>

		<div class="carousel-inner" role=listbox>
			<div class="item active">
				<img src="imagenes/img-guarderias.jpg" class="img-responsive"
				alt="" >
				<div class="carousel-caption hidden-xs hidden-sm">
					<h3>Slide #1</h3>
				</div>
				</div>
				<div class="item">
				<img src="imagenes/img-guar.jpg" class="img-responsive"
				alt=""  >
				<div class="carousel-caption  hidden-xs hidden-sm">
					<h3>Slide #2</h3>
				</div>
				</div>
				<div class="item">
				<img src="imagenes/security-guar.jpg" class="img-responsive"
				alt="">
				<div class="carousel-caption hidden-xs hidden-sm">
					<h3>Slide #3</h3>
				</div>
	</div>
	<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev" >
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Anteriro</span>

	</a>
     
     <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next" >
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Siguiente</span>
		
	</a>
</div>
</div>
<div class="container">
<header>

	
	<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse">
        
        <ul class="nav navbar-nav navbar-center">
            <li><a href="#">Inicio</a></li>
  
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
            		Guarderías <span class="caret"></span>
            	</a>
            	<ul class="dropdown-menu" role="menu">
            		<li><a href="#">Localizar Guarderías</a></li>
            		<li><a href="#">Ver Actividades</a></li>
            		<li><a href="#">Sé parte</a></li>
            	</ul>
            </li>
            <li><a href="#">Contactenos</a></li>
           <li><a href="#">Quienes somos</a></li>
             
            
        </ul>
        <form action="" class="navbar-form navbar-right" role="search">
        	<div class="form-group">
        		<input type="text" class="form-control" placeholder="buscar">
        	</div>
        	<button type="submit" class="btn btn-primary">
        		<span class="glyphicon glyphicon-search"></span>
        	</button>
        </form>
    
       
    </div>
</nav>
		
	
</header>
</div>

 
  <script src="https://code.jquery.com/jquery-latest.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>