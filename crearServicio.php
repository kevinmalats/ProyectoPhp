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
    $mes = $_POST["message"];
    $nom = $_POST["nue"];
    
    if(empty($_POST["select"])){    
        $mensaje="No existen tipos de servicio disponibles para el servicio";
        header("location:mensajeTServicio.php?mensaje=$mensaje");             
    }else{
        if(empty($_POST["select"])){    
            $mensaje="No existen usuarios disponibles para el servicio";
            header("location:mensajeTServicio.php?mensaje=$mensaje");             
        }else{
            $opc = $_POST["select"];
            $op2 = $_POST["select2"];
            $objColector = new servicioCollector();
            $cred = $objColector->crearServicio($opc,$op2,$nom,$mes);
            $mensaje="Nuevo Servicio Ingresado";
            header("location:mensajeTServicio.php?mensaje=$mensaje");
        }
    }
    
?>