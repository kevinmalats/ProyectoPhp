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
    $valor = $_GET["id"];
    $objeto = new comentarioCollector();
    $usubo = $objeto->deleteComentario($valor);
    $mensaje="Comentario eliminado correctamente";
    header("location:mensajeTComentario.php?mensaje=$mensaje"); 
?>