<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('telefono.php');
include_once('database/collector.php');

class TelefonoCollector extends Collector
{
  
  function showTelefonos() {
    $rows = self::$db->getRows("SELECT * FROM telefono ");        
    $arrayTelefono= array();        
    foreach ($rows as $c){
      $aux = new Telefono();
      $aux->setId($c{'id_telefono'});
      $aux->setDescripcion($c{'descripcion'});
      $aux->setInfoUsua($c{'informacion_usuario_id_usuario'});
      array_push($arrayTelefono, $aux);
    }
    return $arrayTelefono;        
  }
    
function telefonoxusuario($id){
   include_once('inforusuario.php');
   $sql="select i.id_usuario,i.nombres from telefono t join informacion_usuario i on informacion_usuario_id_usuario=id_usuario where id_telefono=?";
   $rows = self::$db->getRows($sql, array("{$id}"));
foreach ($rows as $c){
   $aux= new Informacion_usuario();
   $aux->setId($c{'id_usuario'});
   $aux->setNombres($c{'nombres'}); 
    
    }
   return $aux; 
}
  
  

function showTelefono($id) {
    $rows = self::$db->getRows("SELECT * FROM telefono where id_telefono= ? ", array ("{$id}"));        
$aux = new Telefono();
$aux->setId($rows[0]{'id_telefono'});
$aux->setDescripcion($rows[0]{'descripcion'});
$aux->setInfoUsua($rows[0]{'informacion_usuario_id_usuario'});
    return $aux;        
  }


function updateTelefono($id_telefono,$descripcion, $informacion_usuario_id_usuario) {
    $insertrow = self::$db->updateRow("UPDATE public.telefono SET descripcion = ? , informacion_usuario_id_usuario = ? where id_telefono= ? ", array ("{$descripcion}","{$informacion_usuario_id_usuario}",$id_telefono));

}
function deleteTelefono($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.telefono where id_telefono= ? ", array ("{$id}"));

}
function insertTelefono($descripcion, $informacion_usuario_id_usuario) {
    
    $rows = self::$db->insertRow("INSERT INTO public.telefono(descripcion, informacion_usuario_id_usuario) VALUES (?, ?) returning id_telefono", array ("{$descripcion}","{$informacion_usuario_id_usuario}"));  

   return  $rows{"id_telefono"};         
  }

//funciones para combobox de denunciantes y autoridades


}
?>
