<?php
	session_start();

    require_once("credencialCollector.php");
    require_once("usuarioCollector.php");
    $usuario = $_POST["usu"];
    $clave =$_POST["cla"];
    $objColector= new credencialCollector();
    $credencial=$objColector->consultarCredencial("$usuario","$clave");
    if($credencial->getUsuario() and $credencial->getClave()){                        
        $comprobar = "";
        foreach($objColector->mostrarCredencial() as $rc){
            $noc = $rc->getUsuario();
            if($usuario == $noc){
                $comprobar = "si";
            }
        }
        if($comprobar == "si"){
            $mensaje="Todavia no hay un usuario asignado a esta credencial";
            session_destroy();
           
             echo "<meta http-equiv='refresh' content='0;URL= login.php?mensaje=$mensaje'>";
        }else{
            $objColector2= new usuarioCollector();                         
            $usuario = $objColector2->comprobarUsuarioxIdCredencial($credencial->getIdCredencial());
            if($usuario->getIdRol()==1){
                $_SESSION["perfil"]="admin";
                $_SESSION["usu"]=$usuario->getNombre();
                $_SESSION["id"]=$usuario->getIdUsuario();
                $_SESSION["idr"]=$usuario->getIdRol();
                header("location:index.php");
            }else{
                $_SESSION["perfil"]="usuario";
                $_SESSION["usu"]=$usuario->getNombre();
                $_SESSION["id"]=$usuario->getIdUsuario();
                $_SESSION["idr"]=$usuario->getIdRol();
               
                 echo "<meta http-equiv='refresh' content='0;URL= index.php'>";
            }
   
        }       
    }else{
         /*$mensaje="login incorrecto";-->
         header("location:../pages/login.php?mensaje=$mensaje");*/
        $mensaje="login incorrecto";
        
         echo "<meta http-equiv='refresh' content='0;URL= login.php?mensaje=$mensaje'>";
    }
//
?>
