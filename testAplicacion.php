<?php


final class TestAplicacion extends PHPUnit_Framework_TestCase{

function testAdmin(){

	session_start();
	if ( $_SESSION["perfil"]!= "admin"){
    header("location: ../index.php");
   }
}
      function testSession(){
      	session_start();
      	session_destroy();
      }

?>