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

    require_once("tipoproductoCollector.php");
    $valor = $_GET["id"];
    $objeto = new tipoproductoCollector();
    $usubo = $objeto->deleteTipoProducto($valor);
    $mensaje="Tipo de Producto eliminado correctamente";
    header("location:mensajeTTProducto.php?mensaje=$mensaje"); 
?>