<?php 
    require 'includes/app.php';
    incluirTemplate('header')
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam maxime laudantium tempora quidem? Nemo nulla eius ipsam veritatis soluta accusantium rerum odit praesentium magnam aperiam. Ipsa tempore officia dolore iste. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque dolorem in neque at esse similique sapiente eligendi molestiae, vel quis vitae possimus assumenda delectus necessitatibus, commodi error voluptatibus animi quidem!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam maxime laudantium tempora quidem? Nemo nulla eius ipsam veritatis soluta accusantium rerum odit praesentium magnam aperiam. Ipsa tempore officia dolore iste. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque dolorem in neque at esse similique sapiente eligendi molestiae, vel quis vitae possimus assumenda delectus necessitatibus, commodi error voluptatibus animi quidem!</p>
            </div>
        </div>
    </main>
    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat doloribus dicta quibusdam aperiam itaque. Cum aspernatur veritatis quod laudantium asperiores? Dolorum sunt modi veniam, at deleniti animi officiis totam quaerat!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat doloribus dicta quibusdam aperiam itaque. Cum aspernatur veritatis quod laudantium asperiores? Dolorum sunt modi veniam, at deleniti animi officiis totam quaerat!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Seguridad" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat doloribus dicta quibusdam aperiam itaque. Cum aspernatur veritatis quod laudantium asperiores? Dolorum sunt modi veniam, at deleniti animi officiis totam quaerat!</p>
            </div>
        </div>
    </section>
 <?php incluirTemplate('footer');?>