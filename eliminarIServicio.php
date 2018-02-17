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

    require_once("servicioimagenCollector.php");
    $valor = $_GET["id"];
    $objeto = new servicioimagenCollector();
    $img = $objeto->showImagen($valor);
    $dir = $img->getDireccion();
    $nom = $img->getNombre();
    unlink($dir.$nom);
    $usubo = $objeto->deleteImagen($valor);
    $mensaje="Imagen del Servicio eliminado correctamente";
    header("location:mensajeTIServicio.php?mensaje=$mensaje"); 
?>