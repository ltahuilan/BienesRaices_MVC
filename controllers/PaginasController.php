<?php 

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


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
                
        $alerta = NULL;
        // $nombre = $_POST['nombre'];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            //crear instancian de la clase PHPMailer
            $mail = new PHPMailer;

            //server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '40a61d3185837e';
            $mail->Password = '0f6f82fc15c8f4';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
    
            //Direcciones
            $mail->setFrom('info@bienesraices.com');
            $mail->addAddress('info@bienesraices.com', 'Admin');
            
            //contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $_POST['nombre'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $_POST['mensaje'] . '</p>';
            $contenido .= '<p>Presupuesto: $' . $_POST['presupuesto'] . '</p>';

            if($_POST['contacto'] === 'telefono') {
                $contenido .= '<p>Eligió ser contactado por teléfono</>';
                $contenido .= '<p>Telefono: ' . $_POST['telefono'] . '</p>';
                $contenido .= '<p>Fecha de contato: ' . $_POST['fecha'] . '</p>';
                $contenido .= '<p>Hola de contacto: ' . $_POST['hora'] . '</p>';
            }else {
                $contenido .= '<p>Eligió ser contactado por email</>';
                $contenido .= '<p>Email: ' . $_POST['email'] . '</p>';
            }
            
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8'; 
            $mail->Subject = 'Nuevo mensaje Bienes Raices';
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es una prueba de correo enviado desde Bienes Raices --texto sin formato--';
    
            if($mail->send()) {
                $alerta = 'Email enviado correctamente';
            }else {
                $alerta = 'Error de envío...';
            }            
            
        }
        $router->render('paginas/contacto', [
            'alerta' => $alerta
        ]);
    }
}
?>