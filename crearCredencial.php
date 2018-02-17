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
    $usu = $_POST["usu"];
    $log = $_POST["log"];


    $objColector= new credencialCollector();
    $credencial=$objColector->comprobarCredencial("$usu");
    if($credencial->getUsuario()){
        $mensaje="esta credencial ya esta registrado";
        header("location:creacionCredencialPA.php?mensaje=$mensaje");
    }else{
        $cred = $objColector->crearcredencial($usu,$log);
        $mensaje="Nueva Credencial Ingresada";
        header("location:mensajeTCredencial.php?mensaje=$mensaje");
    }   
?>