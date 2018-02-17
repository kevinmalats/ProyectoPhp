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
    require_once("tiposervicioCollector.php");
    
    $nombre = $_POST["nue"];
    $objColector= new tiposervicioCollector();
    $vrol=$objColector->showTiposervicio($nombre);
    if($vrol->getNombre()){
        $mensaje="este tipo de servicio ya esta registrado";
        header("location:creacionTServicioPA.php?mensaje=$mensaje");
    }else{
        $nrol = $objColector->creartipoServicio($nombre);
        $mensaje="Nuevo Tipo de Servicio Ingresado";
        header("location:mensajeTTServicio.php?mensaje=$mensaje");
    }   
?>