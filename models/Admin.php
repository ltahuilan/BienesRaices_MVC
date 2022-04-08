<?php

namespace Model;
// use Model\ActiveRecord;

class Admin extends ActiveRecord{

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];
    // protected static $errores = [];

    public $id;
    public $email;
    public $password;

    public function __construct ($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validarInputs() {

        if(!$this->email) {
            self::$errores[] = 'El email no puede estar vacío';
        }

        if(!$this->password) {
            self::$errores[] = 'El password no puede estar vacío';
        }

        return self::$errores;
    }

    public function validarUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "'";
        $resultado = self::$db->query($query);

        if(!$resultado->num_rows) {
            self::$errores[] = 'Usuario no registrado';
            return; //corta el flujo y el metodo devolverá NULL
        }
        return $resultado;
    }

    public function validarPassword($resultado) {
        $usuario = $resultado->fetch_object(); //fetch_object Devuelve la fila actual de un conjunto de resultados como un objeto
        $autenticado = password_verify($this->password, $usuario->password);
        if(!$autenticado) {
            self::$errores[] = 'El password es incorrecto';
        }

        return $autenticado;
        /**
         * probar los resultados...
         * debuguear($resultado);
         * debuguear($usuario);
         * debuguear($auth);
         */
    }

    public function autenticar() {
        session_start();

        //llenar el arreglo de $_SESSION
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
    
}
?>