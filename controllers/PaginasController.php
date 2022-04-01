<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController {

    public static function index(Router $router) {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {

        $router->render('paginas/nosotros', []);
    }

    public static function anuncios(Router $router) {

        $propiedades = Propiedad::all();

        $router->render('paginas/anuncios', [
            'propiedades' => $propiedades
        ]);
    }

    public static function anuncio(Router $router) {

        $id = validarORedireccionar('/');

        $propiedad = Propiedad::find($id);

        $router->render('paginas/anuncio', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router) {

        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router) {

        $router->render('paginas/entrada-blog', []);
    }

    public static function contacto(Router $router) {

        $router->render('paginas/contacto', []);
    }
}
?>