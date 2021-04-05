
<?php
require 'includes/app.php';
use App\Propiedad;

$id=$_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if(!$id) {
        header('location: /anuncios.php');
    }

    $propiedad = Propiedad::find($id);

    incluirTemplate('header')
?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo;?></h1>
        <img loading='lazy' src="/imagenes/<?php echo $propiedad->imagen;?>" alt="Imagen Propiedad" srcset="">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad->precio;?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p><?php echo $propiedad->wc;?></p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento;?><p>
                </li>
                <li>
                    <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono habitaciones">
                    <p><?php echo $propiedad->habitaciones;?></p>
                </li>
            </ul>
            <p><?php echo $propiedad->descripcion;?></p>
        </div>

    </main>

     <?php incluirTemplate('footer');?>