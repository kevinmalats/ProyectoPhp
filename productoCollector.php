<?php

include_once('producto.php');
include_once('Collector.php');

class productoCollector extends Collector
{
  
    function showProductos() {
        $rows = self::$db->getRows("SELECT * FROM producto inner join usuario on usuario.id_usuario = producto.id_usuario");        
        $array = array();
        foreach ($rows as $c){
            $aux = new producto();
            $aux->setIdProducto($c{'id_producto'});
            $aux->setIdUsuario($c{'id_usuario'});
            $aux->setIdTipoProducto($c{'id_tipo_producto'});
            $aux->setProducto($c{'producto'});
            $aux->setDescripcion($c{'descripcion'});
            $aux->setUsuario($c{'nombre'});
            array_push($array, $aux);
        }
        return $array;        
    }
    function showProducto($id) {
        $rows = self::$db->getRows("SELECT * FROM producto WHERE id_producto= ?", array($id));        
        $aux = new producto();
            foreach ($rows as $c){ 
            $aux->setIdProducto($c{'id_producto'});
            $aux->setIdUsuario($c{'id_usuario'});
            $aux->setIdTipoProducto($c{'id_tipo_producto'});
            $aux->setProducto($c{'producto'});
            $aux->setDescripcion($c{'descripcion'});
        }
        return $aux;        
    } 
    
    function deleteProducto($id){
        $deleterow = self::$db->deleteRow("DELETE FROM producto WHERE id_producto= ?", array($id));
    }
    function crearProducto($idu,$idt,$pro,$des){
        $insertarrow = self::$db->insertRow("INSERT INTO producto (id_usuario,id_tipo_producto,producto,descripcion) VALUES (?,?,?,?)", array ($idu,$idt,"{$pro}","{$des}"));
    }
    function comprobarProducto($nom) {
        $rows = self::$db->getRows("SELECT * FROM producto WHERE producto= ?", array("{$nom}"));        
        $aux = new producto();
            foreach ($rows as $c){ 
            $aux->setIdProducto($c{'id_producto'});
            $aux->setIdUsuario($c{'id_usuario'});
            $aux->setIdTipoProducto($c{'id_tipo_producto'});
            $aux->setProducto($c{'producto'});
            $aux->setDescripcion($c{'descripcion'});
        }
        return $aux;           
    }
    function actualizartipoProducto($nom,$des,$id){
        $row = self::$db->getRows("UPDATE producto SET producto = ?, descripcion = ?  where id_producto= ?",array("{$nom}","{$des}",$id));
    }
}
?>
