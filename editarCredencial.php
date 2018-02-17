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

    $codper = $_GET["cred"];
    $usuari = $_POST["usu"];
    $contra = $_POST["log"];

    $credencial = new credencialCollector();
    //echo "coda es:".$persona->getIdcredencial()."<br>";
    $arraycre = $credencial->showCredenciales();
    $contsi = 0;
    $contno = 0;
    foreach($arraycre as $c){
        if($usuari == $c->getUsuario()){
            if($c->getIdcredencial()==$codper){
              //  echo "no hya cambio"."<br>";
                $contsi = $contsi + 1;
            }else{
            //    echo "no se puede cambiar"."<br>";
                $contno = $contno + 1;
            }
        }else{
          //  echo "nuevo ingreso"."<br>";
             $contsi = $contsi + 1;
        }
    }
    
    if($contno > 0){
        $mensaje="ya existe un usuario con esta credencial";
        header("location:editarCredencialPA.php?mens=$mensaje&id=$codper");
    }else{
        if($codper==1){
            if($_SESSION["id"]==1){
                $actcre = $credencial->actualizarcredencial($usuari,$contra,$codper);
                $mensaje="credenciales actualizadas correctamente";
                //echo "cod es:".$codcredencial;
                header("location:mensajeTCredencial.php?mensaje=$mensaje");
            }else{
                $mensaje="no tiene permiso para cambiar esta credencial";
                //echo "cod es:".$codcredencial;
                header("location:mensajeTCredencial.php?mensaje=$mensaje");
            }
        }else{
                $actcre = $credencial->actualizarcredencial($usuari,$contra,$codper);
                $mensaje="credenciales actualizadas correctamente";
                //echo "cod es:".$codcredencial;
                header("location:mensajeTCredencial.php?mensaje=$mensaje");
            
        }
        
    }
?>