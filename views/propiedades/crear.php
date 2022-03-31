
<main class="contenedor seccion contenido-centrado">
    <?php 
        /**inyectar HTML */
        foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error?>
            </div>
    <?php endforeach; ?>

    <h1>Crear</h1>       

    <a href="/admin" class="boton boton-verde">&lt;&lt;Regresar</a>

    <form class="formulario" method="POST" action="/propiedad/crear" enctype="multipart/form-data">
    <!--enctype="multipart/form-data" atributo que permite leer archivos, info visible desde superglobal $_FILES-->
        <?php include __DIR__.'/formulario.php';?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>