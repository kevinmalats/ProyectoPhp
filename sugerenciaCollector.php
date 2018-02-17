<?php

include_once('sugerencia.php');
include_once('Collector.php');

class sugerenciaCollector extends Collector{

    function showSugerencia(){
        $rows = self::$db->getRows("SELECT * FROM sugerencia INNER JOIN usuario ON usuario.id_usuario = sugerencia.id_usuario");
        $arraysugerencia = array();
        foreach($rows as $c){
        $aux = new sugerencia();
        $aux->setIdsugerencia($c{'id_sugerencia'});
        $aux->setTema($c{'tema'});
        $aux->setMensaje($c{'mensaje'});
        $aux->setNombre($c{'nombre'});
        array_push($arraysugerencia, $aux);
        }
        return $arraysugerencia;
    }

    function deleteSugerencia($id){
        $deleterow = self::$db->deleteRow("DELETE FROM sugerencia WHERE id_sugerencia= ?", array($id));
    }
    
    function comprobarSugerencia($id_usuario) {
        $rows = self::$db->getRows("SELECT * FROM sugerencia WHERE id_sugerencia=? ", array($id_usuario));        
        $ObjSugerencia = new sugerencia();
        foreach($rows as $c){
        $ObjSugerencia->setIdsugerencia($c{'id_sugerencia'});
        $ObjSugerencia->setTema($c{'tema'});
        $ObjSugerencia->setMensaje($c{'mensaje'});
        }
        return $ObjSugerencia;        
    }
        
    function crearSugerencia($tema,$mensaje,$id_usuario){
        $insertarrow = self::$db->insertRow("INSERT INTO sugerencia (mensaje,tema,id_usuario) VALUES (?,?,?)", array ("{$mensaje}","{$tema}",$id_usuario));
    }
    
    function editarSugerencia($tema,$mensaje,$id){
        $row = self::$db->getRows("UPDATE sugerencia SET tema = ? , mensaje = ? where id_sugerencia= ?",array("{$tema}","{$mensaje}",$id));
    }
}

?>

