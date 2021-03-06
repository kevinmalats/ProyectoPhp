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
    $tem = $_POST["tem"];
    $mes = $_POST["message"];
    $fec = $_POST["date"];
    if(empty($_POST["select"])){    
        $mensaje="No existen usuarios disponibles para crear la publicacion";
        header("location:mensajeAdmin.php?mensaje=$mensaje");             
    }else{
        $target_dir = "images/publicacion/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $mensaje;
        // comprueba si el archivo es una imagen o no
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $mensaje = "Este archivo no es una image.n";
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
            header("location:mensajeTPublicacion.php?mensaje=$fmensaje");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $opc = $_POST["select"];
                $objColector= new publicacionCollector();
                $nomimg = basename( $_FILES["fileToUpload"]["name"]);
                $fmensaje ="Nueva Publicacion Ingresada";
                header("location:mensajeTPublicacion.php?mensaje=$fmensaje");               
                $cred = $objColector->crearPublicacion($tem,$mes,$opc,$fec,$nomimg,$target_dir);        
            } else {
                $fmensaje = "Hubo un error al cargar la imagen.";
                header("location:mensajeTPublicacion.php?mensaje=$fmensaje");
            }
        }        
    }
    
?>