<main class="contenedor seccion contenido-centrado-60">
    <h1>Acceso Usuarios</h1>

    <?php foreach($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error?>
        </div>
    <?php endforeach ?>


    <form method="POST" action="/login" class="formulario">
        <fieldset>
            <legend>Acceso a usuarios registrados</legend>

            <div class="grupo">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Tu email" value="">
            </div>

            <div class="grupo">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Escribe tu password">
                
            </div>                
        </fieldset>

        <input type="submit" class="boton boton-verde" value="Inicar Sesión">

    </form>
</main>