<?php

session_start();

include_once "./funciones/funciones.php";
include_once "./funciones/funciones_bd.php";

$errores = [];


//compruebo si he recibido una petición POST
if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    connect_agenda();
    if (comprobarUsuario($_POST["user"])) {

        if (comprobarContraseña($_POST["password"])) {

            if (comprobarCoincidencia($_POST["user"], $_POST["password"])) {

                $_SESSION["user"] = $_POST["user"];
                $_SESSION["password"] = $_POST["password"];
                
                if ($_POST["user"] == "admin") {
                    $_SESSION["rol"] = "A";
                    
                    header("Location: ./paginas/principalAdmin.php");
                    exit();
                } else {
                    $_SESSION["rol"] = "R";
                    header("Location: ./paginas/principalUser.php");
                    exit();
                }
            } else {
                array_push($errores, "El usuario y la contraseña no coinciden");
            }
        } else {
            array_push($errores, "La contraseña no es correcta");
        }
    } else {
        array_push($errores, "El usuario no es correcto");
    }
}

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
        <h1 class="title">Clinica Veterinaria</h1>
        <h3 class="subtitle">Login</h3>
        <div class="alert-usuarioRegistrado" style="display: " <?php echo (isset($_GET["insert"]) && ($_GET["insert"])) ? "" : "hidden" ?>>Usuario Registrado</div>
        <form action="#" method="post">
            <div class="input-group">
                <label for="user">Introduce tu DNI: </label>
                <input type="text" id="user" name="user" required placeholder="01234567A" value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required placeholder="*********" value=<?php echo isset($_POST["password"]) ? $_POST["password"] : ""; ?>>
            </div>

            <?php
            foreach ($errores as $index => $error) {
                echo '<p class="error"> *' . $error . '</p>';
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