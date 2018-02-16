<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('usuario.php');
include_once('database/collector.php');

class UsuarioCollector extends Collector
{
  
  function showUsuarios() {
    $rows = self::$db->getRows("SELECT * FROM usuario ");        
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario();
      $aux->setId($c{'id_usuario'});
      $aux->setNombre($c{'nombre'});
      $aux->setPassword($c{'password'});
      $aux->setPerfil($c{'perfil'});
      $aux->setCiudad($c{'ciudad_id_ciudad'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }

    function showInfoUsuXUsuarios() {
    $rows = self::$db->getRows("SELECT i.id_usuario, u.nombre, u.perfil, u.password FROM usuario u join informacion_usuario i on u.id_usuario= i.usuario_id_usuario");        
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario();
      $aux->setId($c{'id_usuario'});
      $aux->setNombre($c{'nombre'});
      $aux->setPassword($c{'password'});
      $aux->setPerfil($c{'perfil'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }
    
function usuarioDisponibles(){
  $rows = self::$db->getRows("SELECT u.id_usuario, u.nombre, u.password, u.perfil from usuario u  where NOT u.id_usuario in (select i.usuario_id_usuario from informacion_usuario i) ");        
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario();
      $aux->setId($c{'id_usuario'});
      $aux->setNombre($c{'nombre'});
      $aux->setPassword($c{'password'});
      $aux->setPerfil($c{'perfil'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;
}
function ciudadUsuario($id){
     require_once("ciudad.php");
  $sql="SELECT  u.id_ciudad, u.descripcion FROM usuario c join ciudad u on c.ciudad_id_ciudad=u.id_ciudad
   where c.id_usuario= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));
    $aux= new Ciudad();
    $aux->setId($valor[0]{"id_ciudad"});
    $aux->setNombre($valor[0]{"descripcion"});
    
    
   return$aux;
  } 
function showUsuario($id) {
    $rows = self::$db->getRows("SELECT * FROM usuario where id_usuario= ? ", array ("{$id}"));        
$ObjUsuario= new Usuario();
$ObjUsuario->setId($rows[0]{'id_usuario'});
$ObjUsuario->setNombre($rows[0]{'nombre'});
$ObjUsuario->setPassword($rows[0]{'password'});
$ObjUsuario->setPerfil($rows[0]{'perfil'});
    
    return $ObjUsuario;        
  }

function consUsuario($usuario, $contrasenia) {
    $rows = self::$db->getRows("SELECT * 
  FROM usuario WHERE nombre=? AND password=?  ", array ("{$usuario}","{$contrasenia}"));        
$ObjUsuario= new Usuario();
$ObjUsuario->setId($rows[0]{'id_usuario'});
$ObjUsuario->setNombre($rows[0]{'nombre'});
$ObjUsuario->setPassword($rows[0]{'password'});
$ObjUsuario->setPerfil($rows[0]{'perfil'});

    
    return $ObjUsuario;        
  }

function retornaFoto ($usuario){
$rows = self::$db->getRows("SELECT foto_perfil FROM informacion_usuario where usuario_id_usuario= ? ", array ("{$usuario}"));
$fotoperfil=$rows[0]{'foto_perfil'};
return $fotoperfil;
}

function updateUsuario($id_usuario,$nombre, $password, $perfil) {
   $rows = self::$db->getRows("SELECT * FROM usuario where nombre= ? and id_usuario != ? ", 
    array ("{$nombre}","{$id_usuario}"));
  if($rows[0]{'nombre'}==$nombre){
    return false;
  }else{
    $insertrow = self::$db->updateRow("UPDATE public.usuario SET nombre = ?, password = ?, perfil = ? where id_usuario= ? ", array ("{$nombre}","{$password}","{$perfil}",$id_usuario));
    return true;
   }
}
function deleteUsuario($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.usuario where id_usuario= ? ", array ("{$id}"));

}
function insertUsuario($usuario, $contrasenia, $tipousuario,$ciudad) {
  $rows = self::$db->getRows("SELECT * FROM usuario where nombre= ? ", array ("{$usuario}"));
  if($rows[0]{'nombre'}==$usuario){
    return false;
  }else{
  $rows = self::$db->insertRow("INSERT INTO public.usuario(nombre, password, perfil, ciudad_id_ciudad) VALUES (?,?,?,?) returning id_usuario", array ("{$usuario}","{$contrasenia}","{$tipousuario}","{$ciudad}"));      
    return $rows{"id_usuario"} ;      
    
     }
  }

//funciones para combobox de denunciantes y autoridades

/*function showUD() {
    $rows = self::$db->getRows("SELECT * FROM usuario where tipousuario = 2");        
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario($c{'idusuario'},$c{'usuario'},$c{'contrasenia'},$c{'tipousuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }
  function showUA() {
    $rows = self::$db->getRows("SELECT * FROM usuario where tipousuario = 3");        
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario($c{'idusuario'},$c{'usuario'},$c{'contrasenia'},$c{'tipousuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }
*/



}
?>
