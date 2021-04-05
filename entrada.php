<?php 
    require 'includes/app.php';
    incluirTemplate('header')
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading='lazy' src="build/img/destacada2.jpg"" alt="Imagen Propiedad" srcset="">
        </picture>
        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por <span>Admin</span> </p>

        <div class="resumen-propiedad">
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id corrupti cupiditate dicta molestias vel eaque aperiam quia ea earum temporibus libero tempore, odit iste tenetur, quasi recusandae quidem esse? Beatae?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptatibus ea doloremque minus molestiae itaque laboriosam eaque expedita suscipit necessitatibus, omnis, cum recusandae. Officia unde, saepe voluptatem facere maiores delectus!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae velit similique eius, reiciendis, fugiat illo a rem maiores dolore, at id alias facilis deleniti cumque numquam voluptas ut perferendis voluptates!
            </p>
        </div>
    </main>
 <?php incluirTemplate('footer');?>