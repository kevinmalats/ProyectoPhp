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
    require_once("usuarioCollector.php");
    $nombre = $_POST["nom"];
    $cedula = $_POST["ced"];
    $telefo = $_POST["tel"];
    $correo = $_POST["cor"];
    $direcc = $_POST["dir"];
    $usuari = $_POST["usu"];
    $contra = $_POST["con"];
    $idrol = "2";

    $objColector= new credencialCollector();
    $credencial=$objColector->comprobarCredencial("$usuari");
    $objColector2= new usuarioCollector();
    $usuario1=$objColector2->comprobarUsuarioxCedula("$cedula");
    $usuario2=$objColector2->comprobarUsuarioxCorreo("$correo");
    $usuario3=$objColector2->comprobarUsuarioxTelefono("$telefo");
    if($credencial->getUsuario()){
        $mensaje="este usuario ya esta registrado";
        header("location:registre.php?mensaje=$mensaje");
    }else{
        if($usuario1->getIdentificacion()){
            $mensaje="numero de identificacion ya registrado";
            header("location:registre.php?mensaje=$mensaje");
        }else{
            if($usuario2->getCorreo()){
                $mensaje="este correo ya esta registrado";
                header("location:registre.php?mensaje=$mensaje");
            }else{
                if($usuario3->getTelefono()){
                    $mensaje="este telefono ya esta registrado";
                    header("location:registre.php?mensaje=$mensaje");
                }else{
                    $cred = $objColector->crearcredencial($usuari,$contra);
                    $idcre = $objColector->consultarCredencial($usuari,$contra);
                    $prov = $objColector2->crearusuario($nombre,$cedula,$correo,$telefo,$direcc,$idcre->getIdCredencial(),$idrol);
                    $mensaje="Usuario creado correctamente";
                    header("location:login.php?mensaje=$mensaje"); 
                } 
            }
        }   
    }
    /*$DemoCollectorObj = new DemoCollector();
    $ObjDemo = $DemoCollectorObj->createDemo($valor);

    echo "Se ha guardado correctamente </br>";*/

?>