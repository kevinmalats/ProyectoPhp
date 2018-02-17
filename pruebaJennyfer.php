<?php
require_once("detalle_producto.php");
$idDetalProd = "001";
$idProducto = "01";
$nombre = "balanceado";
$test = new detalle_producto();
$test->setIdDetalleProducto($idDetalProd);
$test->setidProducto($idProducto);
$test->setNombre($nombre);
echo "El ID del detalle del producto es: ". $test->getIdDetalleProducto();
echo "El Id del producto es: " .$test->getidProducto();
echo "El nombre del producto es: " .$test->getNombre();
?>