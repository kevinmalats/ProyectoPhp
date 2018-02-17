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

    $cod = $_GET["id"];
    $nom = $_POST["nue"];
    $tse = new tiposervicioCollector();
    $array = $tse->showTiposervicios();
    $contsi = 0;
    $contno = 0;
    foreach($array as $c){
        if($c->getNombre() == $nom){
            if($c->getIdTipoServicio() == $cod){
                $contsi = $contsi + 1;
            }else{
                $contno = $contno + 1;
            }
        }else{
             $contsi = $contsi + 1;
        }
    }
    if($contno > 0){
        $mensaje = "ya existe un tipo servicio con este nombre";
        header("location:editarTServicioPa.php?mensaje=$mensaje&id=$cod");
    }else{
        $actcre = $tse->actualizartipoServicio($nom,$cod);
        $mensaje="tipo de servicio actualizado correctamente";
        header("location:mensajeTTServicio.php?mensaje=$mensaje");
    }
?>