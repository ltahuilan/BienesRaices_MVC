<?php 

/**Conexion a la base de datos
 * se utiliza exit para que en caso de la conexion tenga error
 */

function conectaDB() : mysqli {
    $host = $_ENV['DB_HOST'];
    $usr = $_ENV['DB_USER'];
    $psw = $_ENV['DB_PASS'];
    $db_name = $_ENV['DB_DB'];

    // $db = mysqli_connect($host, $usr, $psw, $db_name);
    $db = new mysqli($host, $usr, $psw, $db_name);

    mysqli_set_charset($db, "utf8");

    if(!$db) {
        echo 'conexion incorrecta';
        exit;
    }

    return $db;
};