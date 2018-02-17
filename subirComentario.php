<?php
    session_start();
    /*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){    
        }else{
            header("location:index.php"); 
        }                            
    }else{      
        header("location:index.php");
    }*/
    require_once("comentarioCollector.php");
    $idc = $_GET["idc"];
    $idp = $_GET["idp"];
    $mes = $_POST["message"];
    $fecha_actual = date('Y-m-d'); 
    echo $fecha_actual;
    $objColector = new comentarioCollector();
    $cred = $objColector->crearComentario($mes,$idp,$idc,$fecha);
    $mensaje="Nuevo Comentario Ingresado";
    header("location:blog-item-usuario.php?id=$idp");        

?>