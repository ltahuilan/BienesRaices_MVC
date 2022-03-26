<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PropiedadController {

    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $resultado = NULL;

        //pasar la vista y datos por medio del metodo render
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado

        ]);
    }

    public static function crear(Router $router) {
        $router->render('propiedades/crear');
    }

    public static function actualizar(Router $router) {
        echo 'Actualizar propiedad';
    }

}
?>