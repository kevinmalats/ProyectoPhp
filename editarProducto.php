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

    $cod = $_GET["id"];
    $nom = $_POST["nom"];
    $des = $_POST["des"];
    $tse = new productoCollector();
    
    $actcre = $tse->actualizartipoProducto($nom,$des,$cod);
    $mensaje="Producto actualizado correctamente";
    header("location:mensajeProducto.php?mensaje=$mensaje");
    
?>