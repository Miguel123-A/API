<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GetClass
 *
 * @author
 */
$app = Slim\Slim::getInstance();

$app->get('/entidad', 'getAllEntidad');
$app->get('/entidad/:id', 'getEntidadId');

function getAllEntidad() {
    $app = Slim\Slim::getInstance();
    $tipo_peticion = $app->request->headers()->get('accept-type');
    $datos= API\DB\Select::getAllEntidades();
    if ($tipo_peticion == 'application/json') { 
        $app->response->header('Content-type', 'application/json');
        if($datos['Estado']=='Exito'){
            $app->response->setStatus(200);
        }
        else{
            if($datos['Estado']=='No Encontrado'){
                $app->response->setStatus(404);
            }
            else{
                if($datos['Estado']=='Error'){
                    $app->response->setStatus(500);
                }
            }
        }
        echo json_encode($datos);                      
    } else {
        if ($tipo_peticion == 'application/xml') {
            $xml = new DomDocument('1.0', 'UTF-8');
            
        }
    }
}

function getEntidadId($id) {
    $app = Slim\Slim::getInstance();
    $tipo_peticion = $app->request->headers()->get('accept-type');
    $datos= API\DB\Select::getEntidadID($id);
    if ($tipo_peticion == 'application/json') { 
        $app->response->header('Content-type', 'application/json');
        if($datos['Estado']=='Exito'){
            $app->response->setStatus(200);
        }
        else{
            if($datos['Estado']=='No Encontrado'){
                $app->response->setStatus(404);
            }
            else{
                if($datos['Estado']=='Error'){
                    $app->response->setStatus(500);
                }
            }
        }
        echo json_encode($datos);                      
    } else {
        if ($tipo_peticion == 'application/xml') {
            $xml = new DomDocument('1.0', 'UTF-8');
            
        }
    }
}

