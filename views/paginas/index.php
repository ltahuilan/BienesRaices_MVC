
<main class="contenedor seccion">
    <h1>M&aacute;s Sobre Nosotros</h1>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Casas y Depas en Venta</h2>

    <?php
        //requiere archivo con consulta a anuncios
        require 'listado.php';
    ?>        

    <div class="alinear-derecha">
        <a class="boton-verde" href="anuncios">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondr&aacute; en contacto contigo a la brevedad</p>
    <a class="boton-amarillo" href="contacto">Cont&aacute;ctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Imegn blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="blog">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>10/07/2021</span> Por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero 
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Imegn blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="blog">
                    <h4>Gu&iacute;a para la decoraci&oacute;n de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>10/07/2021</span> Por: <span>Admin</span></p>
                    <p>Maximiza el espacio en tu hogar con esta gu&iacute;a, aprende a combinar muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article>
    </section><!--.blog-->

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comport&oacute; de una excelente forma, muy buena atenci&oacute;n y la casa que me ofrecieron cumple con todas mis expectativas. 
            </blockquote>
            <p>- Luis Tahuil&aacute;n</p>
        </div>
    </section>
</div>