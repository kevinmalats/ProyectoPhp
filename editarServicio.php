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

    $cod = $_GET["id"];
    $nom = $_POST["nom"];
    $des = $_POST["des"];
    $tse = new servicioCollector();
    
    $actcre = $tse->actualizartipoServicio($nom,$des,$cod);
    $mensaje="Servicio actualizado correctamente";
    header("location:mensajeTServicio.php?mensaje=$mensaje");
    
?>