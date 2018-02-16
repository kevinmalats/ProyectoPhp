<?php
/*if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:../index.php"); 
        }                            
    }else{
        header("location:../index.php");
    }*/
include_once('imagen.php');
include_once('guarderia.php');
include_once('database/collector.php');

class ImagenCollector extends Collector
{

  function showImagenes() {
    $rows = self::$db->getRows("SELECT * FROM imagen ");        
    $arrayImagen= array();        
    foreach ($rows as $c){
      $aux = new Imagen();
      $aux->setId($c{'id_imagen'});
      $aux->setDescripcion($c{'descripcion'});
      $aux->setGuarderia($c{'guarderia_id_guarderia'});
      array_push($arrayImagen, $aux);
    }
    return $arrayImagen;        
  }

function showImagen($id) {
    $rows = self::$db->getRows("SELECT * FROM imagen where id_imagen= ? ", array ("{$id}"));        
    $ObjImagen= new Imagen();
    $ObjImagen->setId($rows[0]{'id_imagen'});
    $ObjImagen->setDescripcion($rows[0]{'descripcion'});
    $ObjImagen->setGuarderia($rows[0]{'guarderia_id_guarderia'});
     
    return $ObjImagen;        
  }
function imagenXGuarderia($id){
  require_once('guarderia.php');
  $sql= "SELECT g.nombre, g.id_guarderia, g.ciudad_id_ciudad FROM imagen i join guarderia g on i.guarderia_id_guarderia= g.id_guarderia where i.id_imagen=? ";
    $rows = self::$db->getRows($sql, array ("{$id}"));
 $objGuard= new Guarderia();
 $objGuard->setId($rows[0]{'id_guarderia'});
 $objGuard->setNombre($rows[0]{'nombre'});
 $objGuard->setCiudadIdCiudad($rows[0]{'ciudad_id_ciudad'});
 return $objGuard;
}
 
function insertImagen($descripcion,$guarderia){
 	  $rows = self::$db->insertRow("INSERT INTO public.imagen(descripcion,guarderia_id_guarderia) VALUES (?,?) returning id_imagen", array ("{$descripcion}","{$guarderia}"));      
    return $rows{"id_imagen"} ;      

}

function guarderiaDisponibles(){
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


function updateImagen($id_imagen,$descripcion, $guarderia) {
     $insertrow = self::$db->updateRow("UPDATE public.imagen SET descripcion = ?, guarderia_id_guarderia = ? where id_imagen= ? ", array ("{$descripcion}","{$guarderia}",$id_imagen));
}

function deleteImagen($id) {
    $deleterow = self::$db->deleteRow("DELETE FROM public.imagen where id_imagen= ? ", array ("{$id}"));

}
}
?>
