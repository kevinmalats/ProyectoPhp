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
    $tem = $_POST["tem"];
    $mes = $_POST["message"];
    if(empty($_POST["select2"])){    
        $mensaje="No existen usuarios disponibles para crear la sugerencia";
        header("location:mensajeTSugerencia.php?mensaje=$mensaje");             
    }else{
        $opc = $_POST["select2"];
        $objColector= new sugerenciaCollector();
        $cred = $objColector->crearSugerencia($tem,$mes,$opc);
        $mensaje="Nueva Sugerencia Ingresada";
        header("location:mensajeTSugerencia.php?mensaje=$mensaje");
    }
?>