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
    $tem = $_POST["subject"];
    $mes = $_POST["message"];
    $idu = $_SESSION["id"];
    $sug = new sugerenciaCollector();
    $cred = $sug->crearSugerencia($tem,$mes,$idu);
    //$mensaje="Nueva Sugerencia Ingresada";
    header("location:contact-us.php");
?>