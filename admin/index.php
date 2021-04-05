<?php 
require '../includes/app.php';
estaAutenticado();

use App\Propiedad;
use App\Vendedor;

//implementar un metodo para obtener todas las propiedades.
    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    $resultado1 = $_GET['resultado']?? null;
    
    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $idDelete = $_POST['id'];
        $idDelete = filter_var($idDelete,FILTER_VALIDATE_INT);
        if ($idDelete){
            $tipo = $_POST['tipo'];

            if (validarTipoContenido($tipo)){
                if($tipo==='propiedad'){
                    $propiedad = Propiedad::find($idDelete);
                    //Eliminar la propiedad
                    $propiedad->eliminar();
                } elseif ($tipo==='vendedor') {
                    $vendedor = Vendedor::find($idDelete);
                    //Eliminar la propiedad
                    $vendedor->eliminar();
                }

            }
        }

    }
    
    
    incluirTemplate('header')

?>
    <main class="contenedor seccion">
        <h1>Administrador De Bienes Raices</h1>
        
        <?php
        $mensaje = mostrarNotificaciones(intval($resultado1));
        if ($mensaje) {?>
        <p class="alerta exito"><?php echo s($mensaje)?></p>
        <?php }  ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>
        
        <h2>Propiedades</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </head>
            <tbody>
                <?php foreach ($propiedades as $propiedad){?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt=""></td>
                    <td><?php echo $propiedad->precio; ?></td>
                    <td>
                        <form action="" method="POST" class="W-100">
                            <input type="hidden" name='id' value="<?php echo $propiedad->id;?>">
                            <input type="hidden" name='tipo' value="propiedad">
                            <input type='submit' value="Eliminar" class="boton-rojo-block">
                        </form>    
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php } ?>
            </body>
        </table>
        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </head>
            <tbody>
                <?php foreach ($vendedores as $vendedor){?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre ." ". $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form action="" method="POST" class="W-100">
                            <input type="hidden" name='id' value="<?php echo $vendedor->id;?>">
                            <input type="hidden" name='tipo' value="vendedor">
                            <input type='submit' value="Eliminar" class="boton-rojo-block">
                        </form>    
                        <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php } ?>
            </body>
        </table>
    </main>

<?php incluirTemplate('footer');?>