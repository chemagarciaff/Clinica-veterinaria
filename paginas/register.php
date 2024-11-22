<?php

session_start();

include_once "./../funciones/funciones_bd.php";


$patron_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$patron_dni = "/^\d{8}[A-Z]$/";
$patron_telefono = "/^[2-9]\d{8}$/";
$patron_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/";




//compruebo si he recibido una petición POST
    if (($_SERVER["REQUEST_METHOD"] == "POST")) {
        if (preg_match($patron_email, $_POST["email"])) {
            if (preg_match($patron_password, $_POST["password"])) {
                if (preg_match($patron_dni, $_POST["dni"])) {
                    if (preg_match($patron_telefono, $_POST["telefono"])) {
                        connect_agenda();
                        if(insert_cliente($_POST["dni"], $_POST["nombre"], $_POST["ape1"], $_POST["ape2"], $_POST["telefono"], $_POST["email"]) && 
                        insert_user($_POST["dni"], $_POST["password"], $_POST["email"])) {
                            header("Location: ../index.php");
                        }




                    } else {
                        echo "El formato del telefono no es correcto";
                    }
                } else {
                    echo "El formato del dni no es correcto";
                }
            } else {
                echo "El formato de la contraseña no es correcto";
            }
        } else {
            echo "El formato del email no es correcto";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./../estilos/style.css">
</head>
<body>
    <div class="login-container">
        <h1>Clinica Veterinaria</h1>
        <h3 class="subtitle">Registro</h3>
        <form action="#" method="post">
            <div class="input-group">
                <label for="email">Correo electronico *</label>
                <input type="email" id="email" name="email" required  value=<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="password">Contraseña *</label>
                <input type="password" id="password" name="password" required  value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirmar Contraseña *</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required  value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="dni">DNI *</label>
                <input type="text" id="dni" name="dni" required  value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="nombre">Nombre *</label>
                <input type="text" id="nombre" name="nombre" required  value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="ape1">Primer apellido *</label>
                <input type="text" id="ape1" name="ape1" required  value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <label for="ape2">Segundo apellido</label>
                <input type="text" id="ape2" name="ape2"  value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <!-- <div class="input-group">
            </div> -->
            <div class="input-group">
                <label for="telefono">Telefono *</label>
                <input type="text" id="telefono" name="telefono" required  value=<?php echo isset($_POST["user"]) ? $_POST["user"] : ""; ?>>
            </div>
            <div class="input-group">
                <input type="submit" value="Iniciar sesión">
            </div>
        </form>
        <div class="forgot-password">
            <a href="./../index.php">Volver a login</a>
        </div>
    </div>
</body>
</html>