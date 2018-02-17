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

    require_once("usuarioCollector.php");
    $valor = $_GET["mensaje"];
    if($valor == 1){
        $mensaje="Usuario no puede ser eliminado";
        header("location:mensajeAdmin.php?mensaje=$mensaje"); 
    }else{
        
        if($_SESSION["id"] == $valor){
            session_destroy();
            header("Location:index.php");
        }else{
            $objeto = new usuarioCollector();
            $usubo = $objeto->deleteUsuario($valor);
            $mensaje="Usuario eliminado correctamente";
            header("location:mensajeAdmin.php?mensaje=$mensaje");
        }               
    }
?>