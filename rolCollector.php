<?php

include_once('rol.php');
include_once('Collector.php');

class rolCollector extends Collector
{
  
  function showRoles() {
    $rows = self::$db->getRows("SELECT * FROM rol ");        
    $arrayRol= array();        
    foreach ($rows as $c){
       $aux = new rol();
       $aux->setIdRol($c{'id_rol'});
       $aux->setNombre($c{'nombre'});
       $aux->setDescripcion($c{'descripcion'});
       array_push($arrayRol, $aux);
    }
    return $arrayRol;        
  }
  function showRol($id) {
      $rows = self::$db->getRows("SELECT * FROM rol WHERE id_rol= ?", array($id));        
      $aux = new rol();
      foreach ($rows as $c){ 
       $aux->setIdRol($c{'id_rol'});
       $aux->setNombre($c{'nombre'});
       $aux->setDescripcion($c{'descripcion'});
      }
      return $aux;        
   }
   function showRolNombre($nom) {
      $rows = self::$db->getRows("SELECT * FROM public.rol WHERE nombre= ?", array("{$nom}"));        
      $aux = new rol();
      foreach ($rows as $c){ 
       $aux->setIdRol($c{'id_rol'});
       $aux->setNombre($c{'nombre'});
       $aux->setDescripcion($c{'descripcion'});
      }
      return $aux;        
   } 
   function deleteRol($id){
      $deleterow = self::$db->deleteRow("DELETE FROM rol WHERE id_rol= ?", array($id));
   }
   function crearrol($nom,$des){
      $insertarrow = self::$db->insertRow("INSERT INTO public.rol (nombre,descripcion) VALUES (?,?)", array ("{$nom}","{$des}"));
   }
   function comprobarRol($rol) {
    $rows = self::$db->getRows("SELECT * FROM public.rol WHERE nombre=? ", array("{$rol}"));        
    $ObjRol = new rol();
        foreach($rows as $c){
            $ObjRol->setIdRol($c{'id_rol'});
            $ObjRol->setNombre($c{'nombre'});
            $ObjRol->setDescripcion($c{'descripcion'});  
        }
        return $ObjRol;        
    }
    function actualizarRol($usu,$cla,$id){
        $row = self::$db->getRows("UPDATE rol SET nombre = ? , descripcion = ? where id_rol= ?",array("{$usu}","{$cla}",$id));
    }
}
?>
