<?php

include_once('direccion.php');
include_once('database/collector.php');

class DireccionCollector extends Collector
{
  
  function showDirecciones() {
    $rows = self::$db->getRows("SELECT * FROM direccion ");        
    $arrayDireccion= array();        
    foreach ($rows as $c){
      $aux = new Direccion();
      $aux->setId($c{'id_direccion'});
      $aux->setDescripcion($c{'descripcion'});
      array_push($arrayDireccion, $aux);
    }
    return $arrayDireccion;        
  }
  

function showDireccion($id) {
    $rows = self::$db->getRows("SELECT * FROM direccion where id_direccion= ? ", array ("{$id}"));        
$aux = new Direccion();
$aux->setId($c{'id_direccion'});
$aux->setDescripcion($c{'descripcion'});
    
    return $aux;        
  }


function updateDireccion($id_direccion,$descripcion) {
    $insertrow = self::$db->updateRow("UPDATE public.direccion SET descripcion = ? where id_direccion= ? ", array ("{$descripcion}",$id_direccion));

}
function deleteDireccion($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.direccion where id_direccion= ? ", array ("{$id}"));

}
function insertDireccion($descripcion) {
    $rows = self::$db->insertRow("INSERT INTO public.direccion(descripcion) VALUES (?) returning id_direccion", array ("{$descripcion}"));   
    return $rows{"id_direccion"};         
  }




}
?>
