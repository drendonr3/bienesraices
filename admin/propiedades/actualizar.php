<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
    estaAutenticado();
    $id=$_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if(!$id) {
        header('location: /admin');
    }
    
    //Obtener los datos de la propiedad
    $propiedad = Propiedad::find($id);

    // Arreglo con Mensajes de Errores
    $errores=Propiedad::getErrores();

    //Consultar Vendedores
    $vendedores = Vendedor::all();

    if ($_SERVER['REQUEST_METHOD']==='POST'){
        // Asignar los atributos
        $args =$_POST['propiedad'];
        // Sincronizar con datos del usuario
        $propiedad->sincronizar($args);

        //SUBIR IMAGEN
        $nombreImagen=md5(uniqid(rand(),true)). ".jpg";
        
        // Realiza un resize a la imagen con intervention
        if ($_FILES['propiedad']['tmp_name']['imagen']){
            
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']);
            //$image->fit(800,600);
            //Setear Imagen
            $propiedad->setImagen($nombreImagen);
        }
       //Validación        
        $errores = $propiedad->validar();

        //Revisar el arreglo
        if (empty($errores)){
            if ($_FILES['propiedad']['tmp_name']['imagen']){
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $propiedad->guardar();
        }
    }
    
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error){?>
            <div class="error alerta">
                <?php echo '' . $error;?>
            </div>
        <?php  }  ?>

        <form  class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario.php';?>
            <input type="submit" value="Actualizar Propiedad" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer');?>