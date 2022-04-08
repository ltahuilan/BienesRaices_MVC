<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {

    public static function login(Router $router) {

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validarInputs();

            if(empty($errores)) {
                //verificar si el usuario esta registrado o existe
                $resultado = $auth->validarUsuario(); //el resultado será NULL si no hay coincidencias

                if(is_null($resultado) ) {
                    $errores = $auth->getErrores();
                }else {
                    //verificar el password
                    $autenticado = $auth->validarPassword($resultado);

                    if(!$autenticado) {
                        $errores = $auth->getErrores();
                    }else {
                        //autenticar usuario
                        $auth->autenticar();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}
?>