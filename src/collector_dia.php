<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('dia.php');
include_once('database/collector.php');

class DiaCollector extends Collector
{
  
  function showDias() {
    $rows = self::$db->getRows("SELECT * FROM dia_horario ");        
    $arrayDia= array();        
    foreach ($rows as $c){
      $aux = new Dia();
      $aux->setId($c{'id_dia'});
      $aux->setNombre($c{'nombre'});
      $aux->setHoraInicio($c{'hora_inicio'});
      $aux->setHoraFin($c{'hora_fin'});
      $aux->setHorarioIdHorario($c{'horario_id_horario'});
      array_push($arrayDia, $aux);
    }
    return $arrayDia;        
  }
  
    function showDiasH($id) {
    $rows = self::$db->getRows("SELECT * FROM dia_horario where id_dia = ? ", array ("{$id}"));        
$ObjGuarderia= new Dia();
$ObjGuarderia->setId($rows[0]{'id_dia'});
$ObjGuarderia->setNombre($rows[0]{'nombre'});
$ObjGuarderia->setHoraInicio($rows[0]{'hora_inicio'});
$ObjGuarderia->setHoraFin($rows[0]{'hora_fin'});
$ObjGuarderia->setHorarioIdHorario($rows[0]{'horario_id_horario'});        
         return $ObjGuarderia;        
  }

    
function updateDia($id_dia,$nombre, $hora_inicio, $hora_fin, $horario_id_horario) {
    $insertrow = self::$db->updateRow("UPDATE public.dia_horario SET nombre = ?, hora_inicio = ?, hora_fin = ? , horario_id_horario = ? where id_dia= ? ", array ("{$nombre}","{$hora_inicio}","{$hora_fin}","{$horario_id_horario}",$id_dia));

}
function deleteDia($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.dia_horario where id_dia= ? ", array ("{$id}"));

}
function insertDia($nombre, $hora_inicio, $hora_fin, $horario_id_horario) {
    $rows = self::$db->insertRow("INSERT INTO public.dia_horario(nombre, hora_inicio, hora_fin, horario_id_horario) VALUES (?,?,?,?) returning id_dia", array ("{$nombre}","{$hora_inicio}","{$hora_fin}", "{$horario_id_horario}"));      
    return $rows{"id_dia"};      
  }


function ActividadXDia($id){
  require_once("actividad.php");
  $sql="SELECT u.actividad_id_actividad, a.descripcion FROM horario u join dia_horario i on u.id_horario= i.horario_id_horario join actividad a 
on a.id_actividad = u.actividad_id_actividad where i.id_dia= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));

$horario= new Actividad();
$horario->SetId($valor[0]{"actividad_id_actividad"});
$horario->setDescripcion($valor[0]{"descripcion"});

   return$horario;
}  

}
?>