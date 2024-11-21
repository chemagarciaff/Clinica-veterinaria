<?php

session_start();

include_once "./funciones/funciones.php";
include_once "./funciones/funciones_bd.php";

//compruebo si he recibido una petición POST
    if (($_SERVER["REQUEST_METHOD"] == "POST")) {
        if(comprobarUsuarios($_POST["user"], $_POST["password"])) {

            echo "hola";
            
                $_SESSION["usuario"] = $_POST["user"];
                $_SESSION["clave"] = $_POST["password"];

                header("Location: ./paginas/saludo.php");
                exit();
                
        }else {
            $errores = "Usuario o contraseña incorrectos";
        }
        
      
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Veterinaria</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>
  
    <div class="login-container">
            <h2>Clinica Veterinaria</h2>
            <form action="#" method="post">
                <div class="input-group">
                    <label for="user">Nombre de usuario:</label>
                    <input type="text" id="user" name="user" required>
                </div>
                <div class="input-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <input type="submit" value="Iniciar sesión">
                </div>
            </form>
            <div class="forgot-password">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
</body>
</html>