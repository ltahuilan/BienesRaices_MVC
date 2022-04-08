<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bines Raices <?php echo isset($admin) ? '- Admin' : '' ?></title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    
    <!--Si la variable $inicio esta definida agrega la cadena de texto 'inicio'-->
    <!--técnica para mostrar la imagen del banner-->
    <header class="header <?php echo $inicio ? 'inicio' : ''?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo">
                    <img src="/build/img/logo.svg" alt="Logo Bienes Raices">
                </a>
                
                <div class="mobil-menu">
                    <img src="/build/img/barras.svg" alt="icono mobil-menu">
                </div>

                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="icono dark-mode" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/anuncios">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <div class="admin">
                            <?php if($auth) : ?>
                                <a href="/admin" class="sesion">Administrar 
                                <a href="/logout" class="sesion">Salir</a>
                            <?php else :?>    
                                <a href="/login" class="sesion">Login</a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </div><!--.barra-->

            <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
        </div>
    </header>
    
    <!-- Inyecta vistas dinamicamente con la variable $contenido desde el Router.php -->
    <?php echo $contenido; ?>

    <footer class="footer">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros">Nosotros</a>
                <a href="anuncios">Anuncios</a>
                <a href="blog">Blog</a>
                <a href="contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos resevados <?php echo date('Y'); ?> &copy;</p>
    </footer>

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>