<main class="contenedor seccion contenido-centrado  ">
    <h1><?php echo $propiedad->titulo; ?></h1>

    <div class="anuncio">
        <picture>
            <!-- <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg"> -->
            <img loading="lazy" src="/uploads/<?php echo $propiedad->imagen; ?>" alt="Imagen destacada">
        </piture>

        <div class="contenido-anuncio">
            <p class="precio">$<?php echo $propiedad->precio; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono escusado">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorios">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamientos">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
            </ul>

            <p>
                <?php echo $propiedad->descripcion; ?>              
            </p>
        </div><!--.contenido-anuncio-->

    </div><!--.anuncio-->

    <a href="/anuncios.php" class="boton boton-verde">&lt;&lt;Ver Todas</a>
</main>