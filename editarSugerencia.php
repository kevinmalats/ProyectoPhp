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

    $cod = $_GET["id"];
    $tem = $_POST["tem"];
    $mes = $_POST["message"];

    $sug = new sugerenciaCollector();
    $actcre = $sug->editarSugerencia($tem,$mes,$cod);
    $mensaje="sugerencia actualizado correctamente";
    header("location:mensajeTSugerencia.php?mensaje=$mensaje");
?>