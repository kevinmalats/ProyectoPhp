<?php

include_once('usuario.php');
include_once('database/collector.php');

class UsuarioCollector extends Collector
{
  
  function showUsuarios() {
    $rows = self::$db->getRows("SELECT * FROM usuario ");        
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario($c{'idusuario'},$c{'usuario'},$c{'contrasenia'},$c{'tipousuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }
  

function showUsuario($id) {
    $rows = self::$db->getRows("SELECT * FROM usuario where idusuario= ? ", array ("{$id}"));        
$ObjUsuario= new Usuario($rows[0]{'idusuario'},$rows[0]{'usuario'},$rows[0]{'contrasenia'},$rows[0]{'tipousuario'});
    
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

function updateUsuario($id_usuario,$nombre, $password, $perfil) {
    $insertrow = self::$db->updateRow("UPDATE public.usuario SET usuario = ?, contrasenia = ?, tipousuario = ? where idusuario= ? ", array ("{$usuario}","{$contrasenia}","{$tipousuario}",$id));

}
function deleteUsuario($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.usuario where idusuario= ? ", array ("{$id}"));

}
function insertUsuario($usuario, $contrasenia, $tipousuario) {
    $rows = self::$db->insertRow("INSERT INTO public.usuario(usuario, contrasenia, tipousuario) VALUES (?,?,?)", array ("{$usuario}","{$contrasenia}","{$tipousuario}"));             
  }

//funciones para combobox de denunciantes y autoridades

function showUD() {
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




}
?>
