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
    require_once("tipoproductoCollector.php");
    
    $nombre = $_POST["nue"];
    $objColector= new tipoproductoCollector();
    $vrol=$objColector->comprobartipoProducto($nombre);
    if($vrol->getNombre()){
        $mensaje="este tipo de producto ya esta registrado";
        header("location:creacionTProductoPA.php?mensaje=$mensaje");
    }else{
        $nrol = $objColector->creartipoProducto($nombre);
        $mensaje="Nuevo Tipo de Producto Ingresado";
        header("location:mensajeTTProducto.php?mensaje=$mensaje");
    }   
?>