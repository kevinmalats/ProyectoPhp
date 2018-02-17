<?php

    include_once('tiposervicio.php');
    include_once('Collector.php');

    class tiposervicioCollector extends Collector
    {
        function showTiposervicios(){
            $rows = self::$db->getRows("SELECT * FROM tipo_servicio");
            $array = array();
            foreach($rows as $c){
                $aux = new tipoServicio();
                $aux->setIdTipoServicio($c{'id_tipo_servicio'});
                $aux->setNombre($c{'nombre'});
                array_push($array, $aux);
            }
            return $array;
        }
        function showTiposervicio($nom) {
            $rows = self::$db->getRows("SELECT * FROM tipo_servicio WHERE nombre = ?", array("{$nom}"));        
            $aux = new tiposervicio();
            foreach ($rows as $c){ 
                $aux->setIdTipoServicio($c{'id_tipo_servicio'});
                $aux->setNombre($c{'nombre'});
            }
          return $aux;        
        }
        function comprobarTiposervicio($id) {
            $rows = self::$db->getRows("SELECT * FROM tipo_servicio WHERE id_tipo_servicio = ?", array($id));        
            $aux = new tiposervicio();
            foreach ($rows as $c){ 
                $aux->setIdTipoServicio($c{'id_tipo_servicio'});
                $aux->setNombre($c{'nombre'});
            }
          return $aux;        
        } 
        function deleteTipoServicio($id){
            $deleterow = self::$db->deleteRow("DELETE FROM tipo_servicio WHERE id_tipo_servicio= ?", array($id));
        }
        function creartipoServicio($nombre){
            $insertarrow = self::$db->insertRow("INSERT INTO tipo_servicio (nombre) VALUES (?)", array("{$nombre}"));
        }
        function actualizartipoServicio($nombre,$id){
            $row = self::$db->getRows("UPDATE tipo_servicio SET nombre = ?  where id_tipo_servicio= ?",array("{$nombre}",$id));
        }
    }
?>

