<?php 
    require '../../includes/app.php';
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;
    
    estaAutenticado();   
    $propiedad= new Propiedad;      

    //Consulta para obtener todos los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con Mensajes de Errores
    $errores=Propiedad::getErrores();
    if ($_SERVER['REQUEST_METHOD']==='POST'){ 
        // Crea una nueva instancia 
        $propiedad= new Propiedad($_POST['propiedad']);          
        //Crear carpeta
        $carpetaImagenes = '../../imagenes/';
        if (!is_dir(CARPETA_IMAGENES)){
            mkdir(CARPETA_IMAGENES);
        }
        //SUBIR IMAGEN
        $nombreImagen=md5(uniqid(rand(),true)). ".jpg";
        
        // Realiza un resize a la imagen con intervention
        if ($_FILES['propiedad']['tmp_name']['imagen']){
            
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']);
            //$image->fit(800,600);

            //Setear Imagen
            $propiedad->setImagen($nombreImagen);
        }
        $errores = $propiedad->validar();
        
        //Revisar el arreglo
        if (empty($errores)){
            if (!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda Imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            // move_uploaded_file($_FILES['imagen']['tmp_name'], CARPETA_IMAGENES . $nombreImagen);
            
            //Guarda en la base de datos
            $propiedad->guardar();

        }
    }
    
    
    incluirTemplate('header');
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error){?>
            <div class="error alerta">
                <?php echo '' . $error;?>
            </div>
        <?php  }  ?>

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario.php';?>
            <input type="submit" value="Crear Propiedad" class="boton-verde">
        </form>
    </main>

<?php incluirTemplate($name='footer');?>