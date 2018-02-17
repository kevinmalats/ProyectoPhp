<?php

    include_once('tipoProducto.php');
    include_once('Collector.php');
    class tipoproductoCollector extends Collector
    {
        function showtipoProductos(){
            $rows = self::$db->getRows("SELECT * FROM tipo_producto");
            $array = array();
            foreach($rows as $c){
                $aux = new tipoProducto();
                $aux->setIdTipoProducto($c{'id_tipo_producto'});
                $aux->setNombre($c{'producto'});
                array_push($array, $aux);
            }
            return $array;
        }
        function showtipoProducto($id) {
            $rows = self::$db->getRows("SELECT * FROM public.tipo_producto WHERE id_tipo_producto= ?", array($id));        
            $aux = new tipoProducto();
            foreach ($rows as $c){
                $aux->setIdTipoProducto($c{'id_tipo_producto'});
                $aux->setNombre($c{'producto'});
            }
            return $aux;        
        }
        function comprobartipoProducto($nom) {
            $rows = self::$db->getRows("SELECT * FROM public.tipo_producto WHERE producto= ?", array("{$nom}"));        
            $aux = new tipoProducto();
            foreach ($rows as $c){
                $aux->setIdTipoProducto($c{'id_tipo_producto'});
                $aux->setNombre($c{'producto'});
            }
            return $aux;        
        }
        function deleteTipoProducto($id){
            $deleterow = self::$db->deleteRow("DELETE FROM tipo_producto WHERE id_tipo_producto= ?", array($id));
        }
        function creartipoProducto($nombre){
            $insertarrow = self::$db->insertRow("INSERT INTO tipo_producto (producto) VALUES (?)", array ("{$nombre}"));
        }
         function actualizartipoProducto($nombre,$id){
            $row = self::$db->getRows("UPDATE tipo_producto SET producto = ?  where id_tipo_producto= ?",array("{$nombre}",$id));
        }
    }
?>
