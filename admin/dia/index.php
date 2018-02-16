<?php
session_start();
if($_SESSION["perfil"]!= "admin"){
	header("location: ../../index.php");

}
require_once("../../src/collector_dia.php");
?>
<html lang="es">
	<head>
		<meta charset ="utf-8">
		<title> Tabla Dias </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link href="../../css/tablas.css" rel="stylesheet" >
	</head>
<body>
<header>

</header>
<section>
</section>
<section>

</section>
<aside>
<?php

 echo "<nav class='navbar navbar-default'>";
    echo "<div class='container-fluid'>";
    echo "<div class='navbar-header'><a class='navbar-brand' >Tabla Días</a></div>";
    echo " <ul class='nav navbar-nav'>";
		      	echo "<li><a href='../index.php'>Atrás</a></li>";
			    echo "<li><a href='crear.php'>Nuevo</a></li>";
		echo "</ul>";
    echo " <ul class='nav navbar-nav navbar-right'>";
    echo "<li><a href='#'>Hola Usuario : (" . $_SESSION ['nombre'] . ")</a></li>";
    echo "<li><a href='../../pages/logout.php''><span class='glyphicon glyphicon-log-in'></span> Salir</a></li>";
    echo "</ul>";
    echo "</div>";
    echo "</nav>";
    echo "<div class='container'>";
    echo "<h2>Dia</h2>";
    echo "<div class='table-responsive'>"; 
		  echo "<table class='table'>"; 
		   echo "<thead>"; 
		   echo "<tr>"; 
		echo " 	   <th>Código</th>"; 
		echo "     <th>Día</th>"; 
		echo " 	   <th>Hora Inicio</th>"; 
		echo "     <th>Hora Fin</th>";
        echo "     <th>Actividad por horario</th>";
		echo "</tr>"; 
		echo "</thead>"; 

$objCollector= new DiaCollector();
foreach ($objCollector->showDias() as $dias) {
	echo "<tbody>"; 
echo "<tr>"; 
echo "<td>".$dias->getId()."</td>"; 
echo "<td>".$dias->getNombre()."</td>";
echo "<td>".$dias->getHoraInicio()."</td>"; 
echo "<td>".$dias->getHoraFin()."</td>";
//echo "<td>".$dias->getHorarioIdHorario()."</td>";  

echo "<td>".$objCollector->ActividadXDia($dias->getId())->getDescripcion()."</td>";   
    
    echo "<td><a href='editar.php?id=".$dias->getId()."'>Editar</a></td>"; 
	echo "<td><a href='eliminar.php?id=".$dias->getId()."'>Eliminar</a></td>"; 
	echo "</tr>"; 

}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
if(isset($_GET["mensaje"])){
    ?>
    <div class="col-md-5 text-center"><p><?php echo $_GET["mensaje"];?></p></div>
        
    <?php
}
?>
</aside>
</body>
</html>