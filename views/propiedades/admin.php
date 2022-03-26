<main class="contenedor seccion contenido-centrado">
    <h1>Administrador de Bienes Raices</h1>  

    <?php if($resultado): 
        $mensaje = mostrarAlerta( intval($resultado) ); ?>
        <?php if($mensaje) :?>
            <p class="alerta correcto"><?php echo sntzr($mensaje); ?></p>
        <?php endif; ?>        
    <?php endif; ?>
    
    <h2>Propiedades</h2>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Descripcion</th>
                <th>Vendedor</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <!-- PASO 5: Mostrar los resultados -->
        <?php foreach($propiedades as $propiedad) : ?>
        <tbody>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td>$<?php echo $propiedad->precio; ?> </td>
                <td class="imagen-propiedad"><img src="/uploads/<?php echo $propiedad->imagen; ?>" alt="<?php echo __DIR__ ?>"></td>
                <td><?php echo $propiedad->descripcion; ?></td>

                            
                <td><?php echo 'Nombre de vendedor'; ?></td>
                <td>

                <form method="POST" class="w-100">
                    <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                    <input type="hidden" name="tipo" value="propiedad">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>

                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
        </tbody>
        <?php endforeach ?>
    </table>

    <!--  -->
    
</main>

