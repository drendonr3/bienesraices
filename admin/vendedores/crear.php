<?php 
require '../../includes/app.php';

use App\Vendedor;

estaAutenticado(); 

$vendedor = new Vendedor;

// Arreglo con Mensajes de Errores
$errores=Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD']==='POST'){ 
    //Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    //Validar que no halla campos vacios
    $errores=$vendedor->validar();

    if (empty($errores)){
        //Guarda en la base de datos
        $vendedor->guardar();

    }
}
incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error){?>
            <div class="error alerta">
                <?php echo '' . $error;?>
            </div>
        <?php  }  ?>

        <form action="/admin/vendedores/crear.php" class="formulario" method="POST">
            <?php include '../../includes/templates/formulario_vendedores.php';?>
            <input type="submit" value="Registrar Vendedor(a)" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate($name='footer');?>