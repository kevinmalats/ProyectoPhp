<?php

    include_once('publicacion.php');
    include_once('Collector.php');

    class publicacionCollector extends Collector{

    function showPublicacion(){
        $rows = self::$db->getRows("SELECT publicacion.id_publicacion, publicacion.titulo, publicacion.contenido, publicacion.id_usuario, publicacion.fecha_publicacion, publicacion.imagen, publicacion.direccion, usuario.nombre FROM publicacion INNER JOIN usuario ON usuario.id_usuario = publicacion.id_usuario");
        $array = array();
        foreach($rows as $c){
        $aux = new publicacion();
        $aux->setIdPublicacion($c{'id_publicacion'});
        $aux->setTitulo($c{'titulo'});
        $aux->setContenido($c{'contenido'});
        $aux->setIdUsuario($c{'id_usuario'});
        $aux->setNombre($c{'nombre'});
        $aux->setFecha($c{'fecha_publicacion'});
        $aux->setImagen($c{'imagen'});
        $aux->setDirimg($c{'direccion'});
        array_push($array, $aux);
        }
        return $array;
    }
    
    function contarComentario($id){
        $rows = self::$db->getRows("SELECT count(*) FROM comentario inner join publicacion on publicacion.id_publicacion = comentario.id_publicacion where comentario.id_publicacion = ?", array($id));
        $valor = 0;
        foreach($rows as $c){
            $valor = $c{'count'};
        }
        return $valor;
    }
    function deletePublicacion($id){
        $deleterow = self::$db->deleteRow("DELETE FROM publicacion WHERE id_publicacion= ?", array($id));
    }
    
    function comprobarPublicacion($id) {
        $rows = self::$db->getRows("SELECT publicacion.id_publicacion, publicacion.titulo, publicacion.contenido, publicacion.id_usuario, publicacion.fecha_publicacion, publicacion.imagen, publicacion.direccion, usuario.nombre FROM publicacion INNER JOIN usuario ON usuario.id_usuario = publicacion.id_usuario where publicacion.id_usuario = ?", array($id));        
        $aux = new publicacion();
        foreach($rows as $c){
        $aux->setIdPublicacion($c{'id_publicacion'});
        $aux->setTitulo($c{'titulo'});
        $aux->setContenido($c{'contenido'});
        $aux->setIdUsuario($c{'id_usuario'});
        $aux->setNombre($c{'nombre'});
        $aux->setFecha($c{'fecha_publicacion'});
        $aux->setImagen($c{'imagen'});
        $aux->setDirimg($c{'direccion'});        
        }
        return $aux;        
    }
    function comprobarComentarioPublicacion($id) {
        $rows = self::$db->getRows("SELECT comentario.id_comentario,comentario.comentario,comentario.id_publicacion,comentario.id_usuario,comentario.fecha_comentario,publicacion.titulo,usuario.nombre, usuario.imagen,usuario.dir_imagen FROM
        comentario INNER JOIN publicacion ON (comentario.id_publicacion = publicacion.id_publicacion) INNER JOIN usuario ON (comentario.id_usuario = usuario.id_usuario)where comentario.id_publicacion = ?", array($id));
        $array = array(); 
        foreach($rows as $c){
        $aux = new publicacion();
        $aux->setIdPublicacion($c{'id_publicacion'});
        $aux->setTitulo($c{'titulo'});
        $aux->setContenido($c{'comentario'});
        $aux->setIdUsuario($c{'id_usuario'});
        $aux->setNombre($c{'nombre'});
        $aux->setFecha($c{'fecha_comentario'});
        $aux->setImagen($c{'imagen'});
        $aux->setDirimg($c{'dir_imagen'});
        array_push($array, $aux);
        }
        return $array;        
    }        
        
    function crearPublicacion($tit,$con,$idu,$fec,$img,$dii){
        $insertarrow = self::$db->insertRow("INSERT INTO publicacion (titulo,contenido,id_usuario,fecha_publicacion,imagen,direccion) VALUES (?,?,?,?,?,?)", array ("{$tit}","{$con}",$idu,"{$fec}","{$img}","{$dii}"));
    }
    
    function editarPublicacion($tit,$con,$id,$img,$fec){
        $row = self::$db->getRows("UPDATE publicacion SET titulo = ? , contenido = ? , imagen = ? , fecha_publicacion = ? where id_publicacion= ?",array("{$tit}","{$con}","{$img}","{$fec}",$id));
    }
}

?>

