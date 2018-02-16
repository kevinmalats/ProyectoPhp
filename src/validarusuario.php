<?php

	session_start();
  //require_once("usuario.php");
  require_once("collectorUsuario.php");
//phpinfo();
 $nombre = $_POST["nombre"];
 $password =$_POST["password"];
 //echo "string";
  $objColector= new UsuarioCollector();

   $usuario=$objColector->consUsuario("$nombre","$password");
   if($usuario->getNombre() and $usuario->getPassword()){
    $_SESSION["perfil"]=$usuario->getPerfil();
    $_SESSION["nombre"]=$usuario->getNombre();
    $fotoperfil=$objColector->retornaFoto($usuario->getId());
    /*if($fotoperfil==""){
      $fotoperfil="img/perfil/anonimo.jpg";
    }*/

    $_SESSION["fotoperfil"]=$fotoperfil;
   
   header("location:../index.php");

   }else{
     $mensaje="login incorrecto";
     header("location:../pages/login.php?mensaje=$mensaje");
      
    }
   
  
  ?>