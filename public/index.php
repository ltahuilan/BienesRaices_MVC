<?php

include_once __DIR__ . '/../includes/app.php';

use Controllers\PropiedadController;
use MVC\Router;

$router = new Router();

//PropiedadController::class muestra el path de la clase

$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/admin/crear', [PropiedadController::class, 'crear']);
$router->get('/admin/actualizar', [PropiedadController::class, 'actualizar']);

$router->comprobarRutas();


?>