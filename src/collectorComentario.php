<?php

include_once('comentario.php');
include_once('database/collector.php');

class ComentarioCollector extends Collector
{
  
  function showComentarios() {
    $rows = self::$db->getRows("SELECT * FROM comentario ");        
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Comentario();
      $aux->setId($c{'id_comentario'});
      $ausx->setDescripcion($c{'descripcion'});
      $aux->setUsuario($c{'informacion_usuario_id_usuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }
  

function showComentario($id) {
    $rows = self::$db->getRows("SELECT * FROM comentario where id_comentario= ? ", array ("{$id}"));        
$ObjComentario= new Comentario($rows[0]{'id_comentario'},$rows[0]{'descripcion'},$rows[0]{'informacion_usuario_id_usuario'});
    
    return $ObjComentario;        
  }



function updateComentario($id_comentario,$descripcion, $usuario) {
    $insertrow = self::$db->updateRow("UPDATE public.comentario SET descripcion = ?, informacion_usuario_id_usuario = ? where id_comentario= ? ", array ("{$descripcion}","{$usuario}",$id));

}
function deleteComentario($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.usuario where idusuario= ? ", array ("{$id}"));

}
function insertUsuario($descripcion, $usuario) {
    $rows = self::$db->insertRow("INSERT INTO public.comentario(descripcion, informacion_usuario_id_usuario) VALUES (?,?,)", array ("{$descripcion}","{$usuario}"));             
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
