<main class="contenedor seccion contenido-centrado">
    <h1>Actualizar Vendedor(a)</h1>

    <?php 
        /**inyectar HTML */
        foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton boton-verde">&lt;&lt;Regresar</a>

    <form class="formulario" method="POST"  >
        
        <?php include 'formulario.php'; ?>

        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>
</main>