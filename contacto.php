<?php 
    require 'includes/app.php';
    incluirTemplate('header')
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading='lazy' src="build/img/destacada3.jpg"" alt="Imagen Contacto" srcset="">
        </picture>
        <h2>Llene el Formulario de Contacto</h2>
        <form action="" class="formulario">
            <fieldset>
                <legend>Información Presonal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email">
                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu Telefono" id="telefono">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Sobre la Propiedad</legend>
                <label for="opciones">Vendes o Compras</label>
                <select name="" id="opciones">
                    <option value="" selected disabled>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>
                <label for="presupuesto">Presupuesto</label>
                <input type="number" placeholder="Presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Cómo desea ser contactado</p>
                <div class="form-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>
                <p>Si eligió telefono, elija la fecha y hora</p>
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha">
                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="16:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

     <?php incluirTemplate('footer');?>