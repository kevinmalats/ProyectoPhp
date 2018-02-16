<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('actividad.php');

include_once('database/collector.php');

class ActividadCollector extends Collector
{
  
  function showActividad() {
    $rows = self::$db->getRows("SELECT * FROM actividad ");        
    $arrayImagen= array();        
    foreach ($rows as $c){
      $aux = new actividad();
      $aux->setId($c{'id_actividad'});
      $aux->setDescripcion($c{'descripcion'});
      $aux->setGuarderia($c{'guarderia_id_guarderia'});
      array_push($arrayImagen, $aux);
    }
    return $arrayImagen;        
  }

function showActividades($id) {
    $rows = self::$db->getRows("SELECT * FROM actividad where id_actividad= ? ", array ("{$id}"));        
    $ObjActividad= new actividad();
    $ObjActividad->setId($rows[0]{'id_actividad'});
    $ObjActividad->setDescripcion($rows[0]{'descripcion'});
    $ObjActividad->setGuarderia($rows[0]{'guarderia_id_guarderia'});
     
    return $ObjActividad;        
  }

 
function insertActividad($descripcion,$guarderia){
 	  $rows = self::$db->insertRow("INSERT INTO public.actividad(descripcion,guarderia_id_guarderia) VALUES (?,?) returning id_actividad", array ("{$descripcion}","{$guarderia}"));      
    return $rows{"id_actividad"} ;      

}

function guarderiaDisponibles(){
include_once('guarderia.php');
  $rows = self::$db->getRows("SELECT id_guarderia, nombre from guarderia ");        
    $arrayGuarderia= array();        
    foreach ($rows as $c){
      $aux = new Guarderia();
      $aux->setId($c{'id_guarderia'});
      $aux->setNombre($c{'nombre'});
      array_push($arrayGuarderia, $aux);
    }
    return $arrayGuarderia;
}

function GuarderiaXActividad($id){
  require_once("guarderia.php");
  $sql="SELECT a.id_guarderia, a.nombre FROM guarderia a join actividad i on a.id_guarderia= i.guarderia_id_guarderia where i.id_actividad= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));

$guarderia= new Guarderia();
$guarderia->SetId($valor[0]{"id_guarderia"});
$guarderia->SetNombre($valor[0]{"nombre"});

   return$guarderia;
}      


function updateActividad($id_actividad,$descripcion, $guarderia) {
     $insertrow = self::$db->updateRow("UPDATE public.actividad SET descripcion = ?, guarderia_id_guarderia = ? where id_actividad= ? ", array ("{$descripcion}","{$guarderia}",$id_actividad));
}

function deleteActividad($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.actividad where id_actividad= ? ", array ("{$id}"));

}
}
?>
