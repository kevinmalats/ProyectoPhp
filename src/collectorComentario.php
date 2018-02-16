<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
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
      $aux->setDescripcion($c{'descripcion'});
      $aux->setUsuario($c{'informacion_usuario_id_usuario'});
      $aux->setGuarderia($c{'guarderia_id_guarderia'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }
  

function showComentario($id) {
    $c = self::$db->getRows("SELECT * FROM comentario where id_comentario= ? ", array ("{$id}"));        
$ObjComentario= new Comentario();
$ObjComentario->setId($c[0]{'id_comentario'});
$ObjComentario->setDescripcion($c[0]{'descripcion'});
$ObjComentario->setUsuario($c[0]{'informacion_usuario_id_usuario'});
$ObjComentario->setGuarderia($c[0]{'guarderia_id_guarderia'});
    
    return $ObjComentario;        
  }


function ComentarioXUsuario($id){
  require_once("usuario.php");
  $sql="SELECT u.id_usuario, u.nombre, u.password, u.perfil FROM comentario c join informacion_usuario i on c.informacion_usuario_id_usuario= i.id_usuario join 
  usuario u on i.usuario_id_usuario= u.id_usuario where c.id_comentario= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));
    $aux= new Usuario();
    $aux->setId($valor[0]{"id_usuario"});
    $aux->setNombre($valor[0]{"nombre"});
     $aux->setPerfil($valor[0]{"perfil"});
    $aux->setPassword($valor[0]{"password"});
    
    
   return$aux;
}
function ComentarioXGuarderia($id){
  require_once("guarderia.php");
  $sql="SELECT u.id_guarderia, u.nombre, u.ciudad_id_ciudad FROM comentario c join guarderia u on c.guarderia_id_guarderia= u.id_guarderia  where c.id_comentario= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));
    $aux= new Guarderia();
    $aux->setId($valor[0]{"id_guarderia"});
    $aux->setNombre($valor[0]{"nombre"});
     $aux->setCiudadIdCiudad($valor[0]{"ciudad_id_ciudad"});
    
    
    
   return$aux;
}
function updateComentario($id_comentario,$descripcion, $usuario) {
    $insertrow = self::$db->updateRow("UPDATE public.comentario SET descripcion = ?, informacion_usuario_id_usuario = ? where id_comentario= ? ", array ("{$descripcion}","{$usuario}",$id_comentario));

}
function deleteComentario($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.comentario where id_comentario= ? ", array ("{$id}"));

}
function insertComentario($descripcion, $usuario, $guarderia) {
    $rows = self::$db->insertRow("INSERT INTO public.comentario(descripcion, informacion_usuario_id_usuario,guarderia_id_guarderia) VALUES (?,?,?)", array ("{$descripcion}","{$usuario}","{$guarderia}"));             
  }





}
?>
