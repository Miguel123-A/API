<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Select
 *
 * @author miguel
 */

namespace API\DB;
use API\DB\util\Connection;

class Select {

    public static function getAllEntidades() {
        //obtenemos una conexion a la base de datos
        $connection = Connection::getConnection();
        /*
         * comprobamos si la variable $connection es 
         * diferente de tipo array, de ser verdadero
         *  significa que algo salio mal con la conexion a 
         * la base de datos y el array contiene la
         * informacion sobre dicho error.
         */
        if (!is_array($connection)) {
            $query = $connection->prepare('SELECT * FROM entidad');
            $query->execute();
            $resultado = $query->fetchAll();
            $query = null; //cerramos la conexion
            if(count($resultado)>0){
            return array('Estado'=>'Exito','Datos'=>$resultado);
            }
            else{
                return array('Estado'=>'No Encontrado','Mensaje'=>'No existe datos sobre la consulta');
            }
        } else{
            return $connection;
        }
    }
    
    public static function getEntidadID($id) {
        //obtenemos una conexion a la base de datos
        $connection = Connection::getConnection();
        /*
         * comprobamos si la variable $connection es 
         * diferente de tipo array, de ser verdadero
         *  significa que algo salio mal con la conexion a 
         * la base de datos y el array contiene la
         * informacion sobre dicho error.
         */
        if (!is_array($connection)) {
            $query = $connection->prepare('SELECT * FROM entidad where id_entidad='.$id);
            $query->execute();
            $resultado = $query->fetchAll();
            $query = null; //cerramos la conexion
            if(count($resultado)>0){
            return array('Estado'=>'Exito','Datos'=>$resultado);
            }
            else{
                return array('Estado'=>'No Encontrado','Mensaje'=>'No existe datos sobre la consulta');
            }
        } else{
            return $connection;
        }
    }

}
