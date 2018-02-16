<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('personal_guarderia.php');
include_once('database/collector.php');

class PersonalGuarderiaCollector extends Collector
{
  
  function showPersonal() {
    $rows = self::$db->getRows("SELECT * FROM personal_guarderia ");        
    $arrayPersonalGuarderia= array();        
    foreach ($rows as $c){
      $aux = new PersonalGuarderia();
      $aux->setId($c{'id_personal'});
      $aux->setNombres($c{'nombres'});
      $aux->setApellidos($c{'apellidos'});
      $aux->setCargo($c{'cargo'});
      $aux->setGuarderiaIdGuarderia($c{'guarderia_id_guarderia'});    
      array_push($arrayPersonalGuarderia, $aux);
    }
    return $arrayPersonalGuarderia;        
  }
  
    function showPersonalG($id) {
    $rows = self::$db->getRows("SELECT * FROM personal_guarderia where id_personal = ? ", array ("{$id}"));        
$ObjGuarderia= new PersonalGuarderia();
$ObjGuarderia->setId($rows[0]{'id_personal'});
$ObjGuarderia->setNombres($rows[0]{'nombres'});
$ObjGuarderia->setApellidos($rows[0]{'apellidos'});
$ObjGuarderia->setCargo($rows[0]{'cargo'});
$ObjGuarderia->setGuarderiaIdGuarderia($rows[0]{'guarderia_id_guarderia'});        
         return $ObjGuarderia;        
  }

    
function updatePersonalGuarderia($id_personal, $nombres, $apellidos, $cargo, $guarderia_id_guarderia) {
    $insertrow = self::$db->updateRow("UPDATE public.personal_guarderia SET nombres = ?, apellidos = ?, cargo = ?, guarderia_id_guarderia = ? where id_personal= ? ", array ("{$nombres}","{$apellidos}", "{$cargo}","{$guarderia_id_guarderia}", $id_personal));

}
function deletePersonalGuarderia($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.personal_guarderia where id_personal= ? ", array ("{$id}"));

}
function insertPersonalGuarderia($nombres, $apellidos, $cargo, $guarderia_id_guarderia) {
    $rows = self::$db->insertRow("INSERT INTO public.personal_guarderia(nombres, apellidos, cargo, guarderia_id_guarderia) VALUES (?,?,?,?) returning id_personal", array ("{$nombres}","{$apellidos}", "{$cargo}","{$guarderia_id_guarderia}"));      
    return $rows{"id_personal"};      
  }
    
    
        
function PersonalXGuarderia($id){
  require_once("guarderia.php");
  $sql="SELECT u.id_guarderia, u.nombre FROM guarderia u join personal_guarderia i on u.id_guarderia= i.guarderia_id_guarderia where i.id_personal= ?";
  $valor=self::$db->getRows($sql, array("{$id}"));

$ciudad= new Guarderia();
$ciudad->SetId($valor[0]{"id_guarderia"});
$ciudad->SetNombre($valor[0]{"nombre"});

   return$ciudad;
}  
}
?>