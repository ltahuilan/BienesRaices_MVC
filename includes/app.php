<?php

use Dotenv\Dotenv;
use Model\ActiveRecord;

require __DIR__.'/../vendor/autoload.php';
//instanciar dotenv recibe como argumento la ruta de ubicacion del archivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
//safeLoad() evita que se muestre error si no se encuentra .env
$dotenv->safeLoad();

require 'funciones.php';
require 'config/database.php';

//obtener la conexion a la base de datos --disponible en cualquier archivo al utilizar app.php
$db = conectaDB();

ActiveRecord::setDB($db);