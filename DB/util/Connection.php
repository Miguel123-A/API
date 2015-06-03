<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author miguel
 */

namespace API\DB\util;

use \PDO;
use \PDOException;

class Connection {
    /*
     * Crea la conexion con la base de datos de tipo PDO
     * en caso de no poder, retornara un array con una
     * bandera de error en true, y un mensaje con la causa
     * del error
     */
    public static function getConnection() {
        $dbhost = "localhost";
        $dbuser = "postgres";
        $dbpass = "miguel";
        $dbname = "app_bd";
        $mbd=null;
        try {
            $mbd = new PDO("pgsql:host=$dbhost;port=5432;dbname=$dbname;user=$dbuser;password=$dbpass");
            }
         catch (PDOException $e) {
             $mbd=null;//cerramos cualquier refencia a la  conexion que pudiera mantenerla abierta
             return array( 'Estado' => 'Error','Mensaje' => 'No se pudo establecer la conexion con la base de datos.');            
        }
        return $mbd;
    }

}
