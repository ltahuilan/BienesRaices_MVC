<main class="contenedor seccion contenido-centrado">
    <h1>Contacto</h1>

    <div class="imagen">
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
        </picture>
    </div>
    <?php if( !is_null($alerta) ) : ?>
        <p class="alerta correcto"><?php echo $alerta?>
    <?php endif; ?>

    <form class="formulario" method="POST" action="contacto" >
        <fieldset>
            <legend>Imformaci&oacute;n Personal</legend>
            <div class="grupo">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Tu nombre" name="nombre" required>
            </div>

            <div class="grupo">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" placeholder="Escribe tu mensaje" name="mensaje" ></textarea>
            </div>                
        </fieldset>

        <fieldset>
            <legend>Informaci&oacute;n sobre la propiedad</legend>
            <div class="grupo">
                <label for="opciones">Vender o comprar</label>
                <select id="opciones" name="opciones" >
                    <option value="" disabled selected>-- Seleccione opción --</option>
                    <option value="comprar">Comprar</option>
                    <option value="vender">Vender</option>
                </select>
            </div>

            <div class="grupo">
                <label for="presupuesto">Seleccione Presupuesto</label>
                <input type="number" placeholder="Tu presupuesto o precio" id="presupuesto" min="1000000" name="presupuesto" >
            </div>
        </fieldset>


        <fieldset>
            <legend>Informaci&oacute;n sobre la propiedad</legend>

            <p>C&oacute;mo desea ser contactado</p>
            <div class="grupo contacto">
                <label for="contacto" id="contacto">Teléfono</label>
                <input type="radio" value="telefono" name="contacto" id="contacto-telefono" >
                <label for="contacto">E-mail</label>
                <input type="radio" value="mail" name="contacto" id="contacto-email">
            </div>

            <div id="tipo-contacto" class="tipo-contacto">

            </div>
        </fieldset>

        <input type="submit" value="Enviar" class="boton">
    </form>
</main>