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

    require_once("tiposervicioCollector.php");
    $valor = $_GET["id"];
    $objeto = new tiposervicioCollector();
    $usubo = $objeto->deleteTipoServicio($valor);
    $mensaje="Tipo de Servicio eliminado correctamente";
    header("location:mensajeTTServicio.php?mensaje=$mensaje"); 
?>