<?php

session_start();

include_once "./funciones/funciones.php";
include_once "./funciones/funciones_bd.php";

$errores = [];

//compruebo si he recibido una petición POST
    if (($_SERVER["REQUEST_METHOD"] == "POST")) {
        connect_agenda();
        if(comprobarUsuario($_POST["user"])){
            
            if(comprobarContraseña($_POST["password"])){
            
                if(comprobarCoincidencia($_POST["user"], $_POST["password"])){

                    $_SESSION["usuario"] = $_POST["user"];
                    $_SESSION["clave"] = $_POST["password"];
            
                    header("Location: ./paginas/saludo.php");
                    exit();

                } else {
                    array_push($errores, "El usuario y la contraseña no coinciden");
                }

            } else {
                array_push($errores, "La contraseña no es correcta");
            }

        } else{
            array_push($errores, "El usuario no es correcta");
        }
    }





        // if(comprobarUsuarios($_POST["user"], $_POST["password"])) {
        
        //         $_SESSION["usuario"] = $_POST["user"];
        //         $_SESSION["clave"] = $_POST["password"];
        
        //         header("Location: ./paginas/saludo.php");
        //         exit();
                
        // }else {
        //     $errores = "Usuario o contraseña incorrectos";
        // }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Veterinaria</title>
    <link rel="stylesheet" href="./estilos/style.css">
</head>
<body>
  
    <div class="login-container">
        <h1>Clinica Veterinaria</h2>
        <h3 class="subtitle">Login</h3>
        <form action="#" method="post">
            <div class="input-group">
                <label for="user">Nombre de usuario (DNI)</label>
                <input type="text" id="user" name="user" required value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required value=<?php echo isset($_POST["password"]) ? $_POST["password"] : ""; ?>>
            </div>

            <?php
                foreach ($errores as $index => $error) {
                    echo '<p class="error"> *'.$error.'</p>';
                }
            ?>

            <div class="input-group">
                <input type="submit" value="Iniciar sesión">
            </div>
        </form>
        <div class="forgot-password">
            <a href="./paginas/register.php">¿No tienes cuenta? Registrate</a>
        </div>
    </div>
</body>
</html>