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
    require_once("credencialCollector.php");
    $valor = $_GET["id"];
    if($valor==1){
        $mensaje="no se puede eliminar esta credencial";
        header("location:mensajeTCredencial.php?mensaje=$mensaje"); 
    }else{        
        $objeto = new credencialCollector();
        $usubo = $objeto->deleteCredencial($valor);
        $mensaje="Credencial eliminada correctamente";
        header("location:mensajeTCredencial.php?mensaje=$mensaje");
    }
   
?>