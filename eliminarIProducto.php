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

    require_once("productoimagenCollector.php");
    $valor = $_GET["id"];
    $objeto = new productoimagenCollector();
    $img = $objeto->showImagen($valor);
    $dir = $img->getDireccion();
    $nom = $img->getNombre();
    unlink($dir.$nom);
    $usubo = $objeto->deleteImagen($valor);
    $mensaje="Imagen del Producto eliminado correctamente";
    header("location:mensajeTIProducto.php?mensaje=$mensaje"); 
?>