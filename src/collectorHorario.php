<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('horario.php');
include_once('database/collector.php');

class HorarioCollector extends Collector
{
  function showHorario() {
    $rows = self::$db->getRows("SELECT * FROM horario ");        
    $arrayHorario= array();        
    foreach ($rows as $c){
      $aux = new Horario();
      $aux->setId($c{'id_horario'});
      $aux->setIdActividad($c{'actividad_id_actividad'});
      array_push($arrayHorario, $aux);
    }
    return $arrayHorario;        
  }
  
function showHorarios($id) {
    $rows = self::$db->getRows("SELECT * FROM horario where id_horario= ? ", array ("{$id}"));        
    $ObjHor= new Horario();
    $ObjHor->setId($rows[0]{'id_horario'});
    $ObjHor->setIdActividad($rows[0]{'actividad_id_actividad'});   
    return $ObjHor;        
  }


function updateHorario($id_horario, $actividad_id_actividad) {
    $insertrow = self::$db->updateRow("UPDATE public.horario SET actividad_id_actividad = ? where id_horario= ? ", array ("{$actividad_id_actividad}",$id_horario));
}


function deleteHorario($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.horario where id_horario= ? ", array ("{$id}"));
}


function insertHorario($actividad_id_actividad) {
      $rows = self::$db->insertRow("INSERT INTO public.horario(actividad_id_actividad) VALUES (?) returning id_horario", array ("{$actividad_id_actividad}"));      
    return $rows{"id_horario"};           
  }


function ActividadDisponibles(){
require_once("actividad.php");
  //$rows = self::$db->getRows("SELECT id_actividad, descripcion from actividad  ");     
    $rows = self::$db->getRows("SELECT id_actividad, descripcion from actividad where NOT id_actividad in (select actividad_id_actividad from horario) ");            
    $arrayActividad= array();        
    foreach ($rows as $c){
      $aux = new Actividad();
      $aux->setId($c{'id_actividad'});
      $aux->setDescripcion($c{'descripcion'});
      array_push($arrayActividad, $aux);
    }
    return $arrayActividad;
}
    

function HorarioXActividad($id){
  require_once("actividad.php");
  $sql="SELECT u.id_actividad, u.descripcion FROM actividad u join horario i on u.id_actividad= i.actividad_id_actividad where i.id_horario= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));

  $actividad= new Actividad();
  $actividad->SetId($valor[0]{"id_actividad"});
  $actividad->SetDescripcion($valor[0]{"descripcion"});
  return$actividad;
}  

}
?>
