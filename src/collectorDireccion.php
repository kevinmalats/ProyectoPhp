<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
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
      $aux->setGuarderia($c{'guarderia_id_guarderia'});  
      array_push($arrayDireccion, $aux);
    }
    return $arrayDireccion;        
  }
  
function direccionxGuarderia($id){
   include_once('guarderia.php');
   $sql="select g.nombre,g.id_guarderia,g.ciudad_id_ciudad from direccion d join guarderia g on guarderia_id_guarderia=id_guarderia where id_direccion=?";
   $rows = self::$db->getRows($sql, array("{$id}"));
foreach ($rows as $c){
   $aux= new Guarderia();
   $aux->setId($c{'id_guarderia'});
   $aux->setNombre($c{'nombre'}); 
   $aux->setCiudadIdCiudad($c{'ciudad_id_ciudad'});  
    }
   return $aux; 
}
   
    
function showDireccion($id) {
    $rows = self::$db->getRows("SELECT * FROM direccion where id_direccion= ? ", array ("{$id}"));        
$aux = new Direccion();
$aux->setId($rows[0]{'id_direccion'});
$aux->setDescripcion($rows[0]{'descripcion'});
$aux->setGuarderia($rows[0]{'guarderia_id_guarderia'});    

    
    return $aux;        
  }

function updateDireccion($id_direccion,$descripcion,$guarderia_id_guarderia) {
    $insertrow = self::$db->updateRow("UPDATE public.direccion SET descripcion = ?, guarderia_id_guarderia =  ?  where id_direccion= ? ", array ("{$descripcion}", "{$guarderia_id_guarderia}",$id_direccion));

}
function deleteDireccion($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.direccion where id_direccion= ? ", array ("{$id}"));

}
function insertDireccion($descripcion,$guarderia) {
    $rows = self::$db->insertRow("INSERT INTO public.direccion(descripcion,guarderia_id_guarderia) VALUES (?,?) returning id_direccion", array ("{$descripcion}","{$guarderia}"));   
    return $rows{"id_direccion"};         
  }
    function guardeiasDisponibles(){
     include_once('guarderia.php');    
  $rows = self::$db->getRows("select g.nombre,g.id_guarderia,g.ciudad_id_ciudad from guarderia g  where NOT g.id_guarderia in (select i.guarderia_id_guarderia from direccion i) ");        
    $arrayGuarderia= array();        
    foreach ($rows as $c){
      $aux = new Guarderia();
      $aux->setId($c{'id_guarderia'});
      $aux->setNombre($c{'nombre'});
      $aux->setCiudadIdCiudad($c{'ciudad_id_ciudad'});
      array_push($arrayGuarderia, $aux);
    }
    return $arrayGuarderia;
}




}
?>
