<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:index.php"); 
        }                            
    }else{
        header("location:index.php");
    }*/
require_once("testAplicacion.php");
$test = new TestAplicacion();
$test->testAdmin();
$test->testSession();
?>