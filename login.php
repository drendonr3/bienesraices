<?php 
        if (!isset($_SESSION)){
            session_start();
        }

        $auth = $_SESSION['login'] ?? null;
        if ($auth){
            header('location: /admin');
        }
    require 'includes/app.php';
    $db=conectarDB();

    $errores = [];
    $email="";
    // Autenticar el usuario 
    if($_SERVER['REQUEST_METHOD']==='POST'){     
        $email=mysqli_real_escape_string($db,filter_Var($_POST['email'],FILTER_VALIDATE_EMAIL));
        $password=mysqli_real_escape_string($db, $_POST['password']);
        if(!$email){
            $errores[]="El email es obligatorio o no es válido";
        }
        if(!$password){
            $errores[]="LA contraseña es obligatorio o no es válido";
        }
        if (empty($errores)){
            $query = "SELECT * FROM usuarios WHERE email='${email}'";
            $resultado = mysqli_query($db,$query);
            if ($resultado->num_rows){
                $usuario = mysqli_fetch_assoc($resultado);
                var_dump($usuario);
                $auth = password_verify($password,$usuario['password']);
                if ($auth){
                    session_start();
                    // Llenar arreglo session
                    $_SESSION['usuario']= $usuario['email'];
                    $_SESSION['login']= true;
                    header('location: /admin');
                } else {
                    $errores[] = "El Password es incorrecto";
                    $_SESSION['usuario']= "";
                    $_SESSION['login']= false;
                    }
            } else {
                $errores[] = "El Usuario No Existe";
            }
        }

    }
    //Incluye Header
    incluirTemplate('header')
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>
        <?php foreach($errores as $error){ ?>
            <div class="alerta error">
                <p><?php echo $error?></p>
            </div>
        <?php } ?>
        <form action="" class="formulario" method="POST">
        <fieldset>
                <legend>E-mail y Password</legend>
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email" name="email" require value="<?php echo $email;?>">
                <label for="password">Pasword</label>
                <input type="password" placeholder="Contraseña" id="password" name="password" require>
            </fieldset>
            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
    </main>

     <?php incluirTemplate('footer');?>