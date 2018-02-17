<?php

include_once('productoimagen.php');
include_once('Collector.php');

class productoimagenCollector extends Collector
{
    function showImagenes() {
        $rows = self::$db->getRows("SELECT * FROM producto_imagen inner join producto on producto.id_producto = producto_imagen.id_producto"); 
        $array = array();
        foreach ($rows as $c){
            $aux = new productoimagen();
            $aux->setIdProductoImagen($c{'id_producto_imagen'});
            $aux->setDireccion($c{'direccion'});
            $aux->setNombre($c{'nombre'});
            $aux->setIdProducto($c{'id_producto'});
            $aux->setProducto($c{'producto'});
            array_push($array, $aux);
        }
        return $array;        
    }
    function showImagen($id) {
        $rows = self::$db->getRows("SELECT * FROM producto_imagen WHERE id_producto_imagen= ?", array($id));        
        $aux = new productoimagen();
            foreach ($rows as $c){ 
            $aux->setIdProductoImagen($c{'id_producto_imagen'});
            $aux->setDireccion($c{'direccion'});
            $aux->setNombre($c{'nombre'});
            $aux->setIdProducto($c{'id_producto'});
        }
        return $aux;        
    }    
    function deleteImagen($id){
        $deleterow = self::$db->deleteRow("DELETE FROM producto_imagen WHERE id_producto_imagen= ?", array($id));
    }
    function crearImagen($dir,$nom,$idp){
        $insertarrow = self::$db->insertRow("INSERT INTO producto_imagen (direccion,nombre,id_producto) VALUES (?,?,?)", array ("{$dir}","{$nom}",$idp));
    }
    function actualizarImagen($nom,$id){
        $row = self::$db->getRows("UPDATE producto_imagen SET nombre = ? where id_producto_imagen= ?",array("{$nom}",$id));
    }
}
?>
