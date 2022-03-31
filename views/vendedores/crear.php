<main class="contenedor seccion contenido-centrado">
    <h1>Crear Vendedor(a)</h1>

    <?php 
    /**inyectar HTML */
    foreach($errores as $error): ?>

        <div class="alerta error">
            <?php echo $error?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">&lt;&lt;Regresar</a>

    <form class="formulario" method="POST" enctype="multipart/form-data">
    <!--enctype="multipart/form-data" atributo que permite leer archivos, info visible desde superglobal $_FILES-->
        
        <?php include 'formulario.php'; ?>

        <input type="submit" value="Crear Vendedor" class="boton boton-verde">
    </form>
</main>