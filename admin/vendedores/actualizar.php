<?php 
require '../../includes/app.php';

use App\Vendedor;

estaAutenticado(); 

//Validar que sea un ID válido
$id=$_GET['id'];
$id=filter_var($id,FILTER_VALIDATE_INT);
if(!$id) {
    header('location: /admin');
}

// Obtener el arreglo del vendedor
$vendedor = Vendedor::find($id);


// Arreglo con Mensajes de Errores
$errores=Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD']==='POST'){ 
    $args = $_POST['vendedor'];
    $vendedor->sincronizar($args);
    //Validacion
    $errores = $vendedor->validar();
    if (empty($errores)){
        //Guarda en la base de datos
        $vendedor->guardar();

    }
}
incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error){?>
            <div class="error alerta">
                <?php echo '' . $error;?>
            </div>
        <?php  }  ?>

        <form action="" class="formulario" method="POST">
            <?php include '../../includes/templates/formulario_vendedores.php';?>
            <input type="submit" value="Guardar Cambios" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate($name='footer');?>