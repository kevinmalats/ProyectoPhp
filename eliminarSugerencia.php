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

    require_once("sugerenciaCollector.php");
    $valor = $_GET["id"];
    $objeto = new sugerenciaCollector();
    $usubo = $objeto->deleteSugerencia($valor);
    $mensaje="Sugerencia eliminada correctamente";
    header("location:mensajeTSugerencia.php?mensaje=$mensaje"); 
?>