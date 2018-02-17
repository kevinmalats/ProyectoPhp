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

    require_once("servicioCollector.php");
    $valor = $_GET["id"];
    $objeto = new servicioCollector();
    $usubo = $objeto->deleteServicio($valor);
    $mensaje="Servicio eliminado correctamente";
    header("location:mensajeTServicio.php?mensaje=$mensaje"); 
?>