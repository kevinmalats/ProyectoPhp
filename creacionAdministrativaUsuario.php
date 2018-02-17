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
    require_once("usuarioCollector.php");
    $nombre = $_POST["nom"];
    $cedula = $_POST["ced"];
    $telefo = $_POST["tel"];
    $correo = $_POST["cor"];
    $direcc = $_POST["dir"];
    $bool = 0;
    if(empty($_POST["select"])){    
        $mensaje="No existen credenciales disponibles para el usuario";
        header("location:mensajeAdmin.php?mensaje=$mensaje");             
    }else{
        if(empty($_POST["select2"])){    
        $mensaje="No existen credenciales disponibles para el usuario";
        header("location:mensajeAdmin.php?mensaje=$mensaje");             
        }else{            
            $opcion = $_POST["select"];
            $opcion2 = $_POST["select2"];
            $objColector2= new usuarioCollector();
            $usuario1=$objColector2->comprobarUsuarioxCedula("$cedula");
            $usuario2=$objColector2->comprobarUsuarioxCorreo("$correo");
            $usuario3=$objColector2->comprobarUsuarioxTelefono("$telefo");
            if($usuario1->getIdentificacion()){
                $mensaje="numero de identificacion ya registrado";
                header("location:creacionUsuarioPA.php?mensaje=$mensaje");
            }else{
                if($usuario2->getCorreo()){
                    $mensaje="este correo ya esta registrado";
                    header("location:creacionUsuarioPA.php?mensaje=$mensaje");
                }else{
                    if($usuario3->getTelefono()){
                        $mensaje="este telefono ya esta registrado";
                        header("location:creacionUsuarioPA.php?mensaje=$mensaje");
                    }else{
                        $target_dir = "images/perfil/";
                        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $mensaje;
                        // comprueba si el archivo es una imagen o no
                        if(isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                            if($check !== false) {
                                $uploadOk = 1;
                            } else {
                                $mensaje = "Este archivo no es una imagen";
                                $uploadOk = 0;
                            }
                        }
                        // comprueba si ya existe un imagen igual en la carpeta;
                        if (file_exists($target_file)) {
                            $mensaje = "Este archivo ya existe.";
                            $uploadOk = 0;
                        }
                        // comprueba si el tamaño de la imagen excede lo 50kb.
                        if ($_FILES["fileToUpload"]["size"] > 500000) {
                            $mensaje = "Este archivo es muy grande";
                            $uploadOk = 0;
                        }
                        // comprueba el formato de la imagen
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            $mensaje = "solo permite JPG, JPEG, PNG & GIF";
                            $uploadOk = 0;
                        }
                        // verifica si encontro algun error;
                        if ($uploadOk == 0) {
                            $fmensaje = "Este archivo no puede ser cargado. ".$mensaje;
                            header("location:mensajeAdmin.php?mensaje=$fmensaje");
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            //    $objeto = new productoimagenCollector();
                                $nomimg = basename( $_FILES["fileToUpload"]["name"]);
                                $prov = $objColector2->crearusuario($nombre,$cedula,$correo,$telefo,$direcc,$opcion2,$opcion,$nomimg,$target_dir);
                                $fmensaje = "Uusuario Creado Exitosamente.";
                                header("location:mensajeAdmin.php?mensaje=$fmensaje");
                            } else {
                                $fmensaje = "Hubo un error al cargar la imagen.";
                                header("location:mensajeAdmin.php?mensaje=$fmensaje");
                            }
                        }
                    } 
                }
            }    
        }   
    }
?>