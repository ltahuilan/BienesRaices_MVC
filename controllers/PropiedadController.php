<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController {

    public static function index(Router $router) {
        //consultar todos los registros... all() método estatico en en ActiveRecord
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();

        $resultado = $_GET['resultado'] ?? NULL;

        //render a la vista, pasa la ruta de la vista y los datos
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {
        //instaciar objeto de la clase Propiedad para tener el modelo de datos disponible
        $propiedad = new Propiedad();        
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrores();

        if($_SERVER["REQUEST_METHOD"] == 'POST') {
        
            //instanciar la clase
            $propiedad = new Propiedad($_POST);
            /**ARCHIVOS */
            
            //Asignar archivo a la variable
            $imagen = $_FILES['imagen']['name'];        
            
            if($imagen) {
                //generar nombre unico
                $imagen = uniqid(rand()) . $imagen;

                //pasar el nombre de la imagen hacia la clase (modelo)
                $propiedad->setImagen($imagen);
            }
            
            //validacion
            $errores = $propiedad->validar();
            
            if(empty($errores)) { 
                
                //verificar si el directorio para almacenar imagenes existe
                if(!is_dir(DIR_IMAGENES)) {
                    mkdir(DIR_IMAGENES);
                }
    
                //setear la imagen
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
    
                //subir archivo
                $image->save( DIR_IMAGENES . $imagen);
                
                //Guardar en la BASE DE DATOS
                $resultado = $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        
        $errores = Propiedad::getErrores();

        //validar id de propiedad
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        // if($id != $propiedad->$id) {
        //     header('Location: /admin');
        // }
        $vendedores = Vendedor::all();

        if($_SERVER["REQUEST_METHOD"] == 'POST') {

            //sincronizar el objeto en memoria
            $resultado = $propiedad->sincronizar($_POST);
    
            //validar campos                  
            $errores = $propiedad->validar();
    
            //generar nombre de archivo
            $imagen = !$_FILES['imagen']['name'] ? '.jpg' : $_FILES['imagen']['name'];
    
            //generar nombre unico
            $nombreImg = uniqid(rand()) . $imagen;
    
            //Si exite un archivo en la super globlal
            if ($_FILES['imagen']['name']){
                //setear la imagen
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
    
                //pasar el nombre de la imagen hacia la clase (modelo)
                $propiedad->setImagen($nombreImg);
            }       
            
            if(empty($errores)) {
    
                $propiedad->guardar();
                
                if($_FILES['imagen']['tmp_name']) {
                    //subir archivo
                    $image->save( DIR_IMAGENES . $nombreImg);
                }
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }


    public static function eliminar() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //obtener el id de la propiedad a eliminar
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            $tipo = $_POST['tipo'];

            if(validarTipo($tipo)) {
                if($tipo === 'propiedad') {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }

}
?>