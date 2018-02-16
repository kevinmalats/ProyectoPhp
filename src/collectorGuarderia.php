<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('guarderia.php');
include_once('database/collector.php');

class GuarderiaCollector extends Collector
{
  
  function showGuarderia() {
    $rows = self::$db->getRows("SELECT * FROM guarderia ");        
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
  
    
    function showGuarderias($id) {
    $rows = self::$db->getRows("SELECT * FROM guarderia where id_guarderia = ? ", array ("{$id}"));        
$ObjGuarderia= new Guarderia();
$ObjGuarderia->setId($rows[0]{'id_guarderia'});
$ObjGuarderia->setNombre($rows[0]{'nombre'});
$ObjGuarderia->setCiudadIdCiudad($rows[0]{'ciudad_id_ciudad'});        

    
    return $ObjGuarderia;        
  }
    
function updateGuarderia($id_guarderia, $nombre, $ciudad_id_ciudad) {
    $insertrow = self::$db->updateRow("UPDATE public.guarderia SET nombre = ?, ciudad_id_ciudad = ? where id_guarderia = ? ", array ("{$nombre}","{$ciudad_id_ciudad}", $id_guarderia));

}
function deleteGuarderia($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.guarderia where id_guarderia= ? ", array ("{$id}"));

}
function insertGuarderia($nombre, $ciudad_id_ciudad) {
    $rows = self::$db->insertRow("INSERT INTO public.guarderia(nombre, ciudad_id_ciudad) VALUES (?,?) returning id_guarderia", array ("{$nombre}","{$ciudad_id_ciudad}"));      
    return $rows{"id_guarderia"};      
  }
    
    
function GuarderiaXCiudad($id){
  require_once("ciudad.php");
  $sql="SELECT u.id_ciudad, u.descripcion FROM ciudad u join guarderia i on u.id_ciudad= i.ciudad_id_ciudad where i.id_guarderia= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));

$ciudad= new Ciudad();
$ciudad->SetId($valor[0]{"id_ciudad"});
$ciudad->SetNombre($valor[0]{"descripcion"});

   return$ciudad;
}      
    
}
?>