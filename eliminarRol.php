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

    require_once("rolCollector.php");
    $valor = $_GET["id"];
    if($valor == 1 || $valor == 2){
        $mensaje="NO tiene permisos para realizar esta accion";
        header("location:mensajeTRol.php?mensaje=$mensaje"); 
    }else{
        $objeto = new rolCollector();
        $usubo = $objeto->deleteRol($valor);
        $mensaje="Rol eliminado correctamente";
        header("location:mensajeTRol.php?mensaje=$mensaje");     
    }
    
?>