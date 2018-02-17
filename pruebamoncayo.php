<?php
require_once("registro.php");
$idregistro = "12";
$idcredencial = "123";
$descripcion = " esto es una prubasss";
$test = new registro();
$test->setIdRegistro($idregistro);
$test->setIdCredencial($idcredencial);
$test->setDescripcion($descripcion);
echo "El ID del registro es: ". $test->getIdRegistro();
echo "El Id de la credencia es: " .$test->getIdCredencial();
echo "La descripcion es: " .$test->getDescripcion();
?>