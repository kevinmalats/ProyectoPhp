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
    require_once("productoCollector.php");
    $mes = $_POST["message"];
    $nom = $_POST["nue"];

    if(empty($_POST["select"])){    
        $mensaje="No existen tipos de productos disponibles para crear el producto";
        header("location:mensajeAdmin.php?mensaje=$mensaje");             
    }else{
        if(empty($_POST["select2"])){    
        $mensaje="No existen tipos de productos disponibles para crear el producto";
        header("location:mensajeAdmin.php?mensaje=$mensaje");             
        }else{
            $opc = $_POST["select"];
            $op2 = $_POST["select2"];
            $objColector = new productoCollector();
            $cred = $objColector->crearProducto($opc,$op2,$nom,$mes);
            $mensaje="Nuevo Producto Ingresado";
            header("location:mensajeProducto.php?mensaje=$mensaje");
        }
    }
?>