<?php 

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController {

    public static function crear(Router $router) {

        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //instanciar objeto y pasar los datos de $_POST
            $vendedor = new Vendedor($_POST);
    
            //validar los campos
            $errores = $vendedor->validar();
    
            if( empty($errores) ) {    
                $resultado = $vendedor->guardar();    
            }    
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function actualizar(Router $router) {
        
        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        //encontrar la propiedad a eliminar
        $vendedor = Vendedor::find($id);

        if($_SERVER["REQUEST_METHOD"] == 'POST') {
    
            //sincronizar objeto en memoria
            $vendedor->sincronizar($_POST);
        
            //validar la entrada de datos
            $errores = $vendedor->validar();    
            
            if(empty($errores)) {            
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);   
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $tipo = $_POST['tipo'];

            if( validarTipo($tipo) ) {
                if($tipo === 'vendedor') {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
            
        }
    }
}

?>