<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author cambios otro
 */
require_once 'vendor/autoload.php';
require_once 'DB/util/init.php';

$app = new Slim\Slim();

/*
 * Verificamos que tipo de peticion es:
 * GET, POST, PUT o DELETE
 * para cargar las rutas disponibles para
 * cada tipo de peticion
 */

if ($app->request->isGet()) {
    require_once 'routes/GetRoutes.php';
} else {
    if ($app->request->isPost()) {
        require_once 'routes/PostRoutes.php';
    } else {
        if ($app->request->isPut()) {
            require_once 'routes/PutRoutes.php';
        }else{
            require_once 'routes/DeleteRoutes.php';
        }
    }
}

$app->run();