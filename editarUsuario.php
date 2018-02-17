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
    $codper = $_GET["persona"];
    $nombre = $_POST["nom"];
    $cedula = $_POST["ced"];
    $telefo = $_POST["tel"];
    $correo = $_POST["cor"];
    $direcc = $_POST["dir"];
    if($codper==1){
        $opcion = 1;
    }else{
        $opcion = $_POST["select"];   
    }
    $target_dir = "images/perfil/";
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
        header("location:mensajeAdmin.php?mensaje=$fmensaje");
    // if everything is ok, try to upload file
    } else {
        if($_SESSION["id"]==$codper){
            if($_SESSION["idr"]== $opcion){
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $colpersona = new usuarioCollector();
                $imgi = $colpersona->todaInfoID($codper);
                $diri = $imgi->getDirImg();
                $nomi = $imgi->getNomImg();
                unlink($diri.$nomi);
                $nomimg = basename( $_FILES["fileToUpload"]["name"]);
                $persona = $colpersona->editarusuario($codper,$nombre,$cedula,$correo,$telefo,$direcc,$opcion,$nomimg);
                $fmensaje = "usuario actualizado correctamente";
                header("location:mensajeAdmin.php?mensaje=$fmensaje");
                } else {
                    $fmensaje = "Hubo un error al cargar la imagen.";
                    header("location:mensajeAdmin.php?mensaje=$fmensaje");
                }
            }else{
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $colpersona = new usuarioCollector();
                $imgi = $colpersona->todaInfoID($codper);
                $diri = $imgi->getDirImg();
                $nomi = $imgi->getNomImg();
                unlink($diri.$nomi);
                $nomimg = basename( $_FILES["fileToUpload"]["name"]);
                $persona = $colpersona->editarusuario($codper,$nombre,$cedula,$correo,$telefo,$direcc,$opcion,$nomimg);
                session_destroy();
                header("Location:index.php");
                } else {
                    $fmensaje = "Hubo un error al cargar la imagen.";
                    header("location:mensajeAdmin.php?mensaje=$fmensaje");
                }
            }  
        }else{
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $colpersona = new usuarioCollector();
            $imgi = $colpersona->todaInfoID($codper);
            $diri = $imgi->getDirImg();
            $nomi = $imgi->getNomImg();
            unlink($diri.$nomi);
            $nomimg = basename( $_FILES["fileToUpload"]["name"]);
            $persona = $colpersona->editarusuario($codper,$nombre,$cedula,$correo,$telefo,$direcc,$opcion,$nomimg);
            $fmensaje = "usuario actualizado correctamente";
            header("location:mensajeAdmin.php?mensaje=$fmensaje");
            } else {
                $fmensaje = "Hubo un error al cargar la imagen.";
                header("location:mensajeAdmin.php?mensaje=$fmensaje");
            }
        }
    }

?>