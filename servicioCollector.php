<?php

    include_once('servicio.php');
    include_once('Collector.php');

    class servicioCollector extends Collector
    {

       function showServicios() {
        $rows = self::$db->getRows("SELECT * FROM servicio inner join usuario on usuario.id_usuario = servicio.id_usuario");        
        $array= array();
        foreach ($rows as $c){
            $aux = new servicio();
            $aux->setIdServicio($c{'id_servicio'});
            $aux->setIdUsuario($c{'id_usuario'});
            $aux->setIdTipoServicio($c{'id_tipo_servicio'});
            $aux->setServicio($c{'servicio'});
            $aux->setDescripcion($c{'descripcion'});
            $aux->setUsuario($c{'nombre'});
            array_push($array, $aux);
        }
        return $array;        
        }
        function showServicio($id) {
            $rows = self::$db->getRows("SELECT * FROM servicio WHERE id_servicio= ?", array($id));        
            $aux = new servicio();
            foreach ($rows as $c){ 
            $aux->setIdServicio($c{'id_servicio'});
            $aux->setIdUsuario($c{'id_usuario'});
            $aux->setIdTipoServicio($c{'id_tipo_servicio'});
            $aux->setServicio($c{'servicio'});
            $aux->setDescripcion($c{'descripcion'});
        }
          return $aux;        
        } 
        function deleteServicio($id){
            $deleterow = self::$db->deleteRow("DELETE FROM servicio WHERE id_servicio= ?", array($id));
        }
        function crearServicio($idu,$idt,$ser,$des){
            $insertarrow = self::$db->insertRow("INSERT INTO servicio (id_usuario,id_tipo_servicio,servicio,descripcion) VALUES (?,?,?,?)", array($idu,$idt,"{$ser}","{$des}"));
        }
        function actualizartipoServicio($nom,$des,$id){
            $row = self::$db->getRows("UPDATE servicio SET servicio = ?, descripcion = ?  where id_servicio= ?",array("{$nom}","{$des}",$id));
        }
    }
?>
