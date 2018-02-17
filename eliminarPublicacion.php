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
    require_once("publicacionCollector.php");
    $valor = $_GET["id"];
    $objeto = new publicacionCollector();
    $usubo = $objeto->deletePublicacion($valor);
    $mensaje="Publicacion eliminada correctamente";
    header("location:mensajeTPublicacion.php?mensaje=$mensaje"); 
?>