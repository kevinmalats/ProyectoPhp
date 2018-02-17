<?php
    session_start();
    if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:index.php"); 
        }                            
    }else{
        header("location:index.php");
    }

    require_once("productoCollector.php");
    $valor = $_GET["id"];
    $objeto = new productoCollector();
    $usubo = $objeto->deleteProducto($valor);
    $mensaje="Producto eliminado correctamente";
    header("location:mensajeProducto.php?mensaje=$mensaje"); 
?>