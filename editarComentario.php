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

    require_once("comentarioCollector.php");

    $cod = $_GET["id"];
    $mes = $_POST["message"];
    $fec = $_POST["date"];
    $sug = new comentarioCollector();
    $actcre = $sug->editarComentario($mes,$cod,$fec);
    $mensaje="comentario actualizado correctamente";
    header("location:mensajeTComentario.php?mensaje=$mensaje");
?>