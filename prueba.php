<?php
require_once("credencial.php");
$usu = "dani";
$cla = "1234";
$test = new credencial();
$test->setUsuario($usu);
$test->setClave($cla);
echo "el usuario se llama: ". $test->getUsuario();
echo "la contraseña es: " .$test->getClave;
?>
