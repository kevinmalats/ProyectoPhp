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
    
require_once("rolCollector.php");

    $codper = $_GET["id"];
    $usuari = $_POST["nue"];
    $contra = $_POST["des"];

    $rol = new rolCollector();
    //echo "coda es:".$persona->getIdcredencial()."<br>";
    $arrayrol = $rol->showRoles();
    $contsi = 0;
    $contno = 0;
    foreach($arrayrol as $c){
        if($usuari == $c->getNombre()){
            if($c->getIdRol()==$codper){
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
        $mensaje="ya existe un rol con este nombre";
        header("location:editarRolPa.php?mensaje=$mensaje&id=$codper");
    }else{
        $actcre = $rol->actualizarRol($usuari,$contra,$codper);
        $mensaje="rol actualizado correctamente";
        //echo "cod es:".$codcredencial;
        header("location:mensajeTRol.php?mensaje=$mensaje");
    }
?>