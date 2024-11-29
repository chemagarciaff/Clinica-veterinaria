<?php

session_start();

include_once "./../funciones/funciones_bd.php";
include_once "./../funciones/funciones.php";

$_ERROR = [];


$patron_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$patron_dni = "/^\d{8}[A-Z]$/";
$patron_telefono = "/^[2-9]\d{8}$/";
$patron_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/";


$comprobadorRegistro = true;

//compruebo si he recibido una petición POST
if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    //Comprobamos que el email tiene un patron correcto
    if (preg_match($patron_email, $_POST["email"])) {

        //Comprobamos que la contraseña tiene un patron correcto
        if (preg_match($patron_password, $_POST["password"])) {

            //Comprobamos que el dni tiene un patron correcto
            if (preg_match($patron_dni, $_POST["dni"])) {

                //Comprobamos que el telefono tiene un patron correcto
                if (preg_match($patron_telefono, $_POST["telefono"])) {

                    //Comprobamos que las contraseñas coinciden
                    if ($_POST["password"] == $_POST["confirmPassword"]) {

                        connect_agenda();

                        //Hacemos las insercciones en usuarios y en clientes
                        if (
                            insert_cliente($_POST["dni"], $_POST["nombre"], $_POST["ape1"], $_POST["ape2"], $_POST["telefono"], $_POST["email"])
                            && insert_user($_POST["dni"], $_POST["password"], $_POST["email"])
                        ) {

                            header("Location: ../index.php?insert=true");
                        } else {

                            $comprobadorRegistro = false;
                        }
                    } else {
                        $_ERROR["password"] = "Las contraseñas no coinciden";
                        $comprobadorRegistro = false;
                    }
                } else {
                    $_ERROR["telefono"] = "El formato del telefono no es correcto";
                    $comprobadorRegistro = false;
                }
            } else {
                $_ERROR["dni"] = "El formato del dni no es correcto";
                $comprobadorRegistro = false;
            }
        } else {
            $_ERROR["password"] = "El formato de la contraseña no es correcto";
            $comprobadorRegistro = false;
        }
    } else {
        $_ERROR["email"] = "El formato del email no es correcto";
        $comprobadorRegistro = false;
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
        <h1 class="title">Clinica Veterinaria</h1>
        <h3 class="subtitle">Registro</h3>
        <div class="alert-usuarioNoRegistrado" style="display: " <?php echo (!$comprobadorRegistro) ? "" : "hidden" ?>>Registro Fallido</div>
        <form action="#" method="post">
            <div class="input-group">
                <label for="email">Correo electronico *</label>
                <input type="email" id="email" name="email" required value=<?php echo isset($_POST["email"]) ? $_POST["email"] : ""; ?>>
            </div>
            <?php echo isset($_ERROR["email"]) ? '<p class="register-error"> '.$_ERROR["email"].'</p>' : ""?>
            <div class="row-group">

                <div class="input-group">
                    <label for="password">Contraseña *</label>
                    <input type="password" id="password" name="password" required value=<?php echo isset($_POST["password"]) ? $_POST["password"] : ""; ?>>
                </div>
                <div class="input-group">
                    <label for="confirmPassword">Confirmar Contraseña *</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required value=<?php echo isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"] : ""; ?>>
                </div>
            </div>
            <?php echo isset($_ERROR["password"]) ? '<p class="register-error"> '.$_ERROR["password"].'</p>' : ""?>
            
            <div class="row-group">

                <div class="input-group">
                    <label for="dni">DNI *</label>
                    <input type="text" id="dni" name="dni" required minlength="9" maxlength="9" value=<?php echo isset($_POST["dni"]) ? $_POST["dni"] : ""; ?>>
                </div>
                <div class="input-group">
                    <label for="nombre">Nombre *</label>
                    <input type="text" id="nombre" name="nombre" required value=<?php echo isset($_POST["nombre"]) ? $_POST["nombre"] : ""; ?>>
                </div>
            </div>
            <?php echo isset($_ERROR["dni"]) ? '<p class="register-error"> '.$_ERROR["dni"].'</p>' : ""?>

            <div class="row-group">

                <div class="input-group">
                    <label for="ape1">Primer apellido *</label>
                    <input type="text" id="ape1" name="ape1" required value=<?php echo isset($_POST["ape1"]) ? $_POST["ape1"] : ""; ?>>
                </div>
                <div class="input-group">
                    <label for="ape2">Segundo apellido</label>
                    <input type="text" id="ape2" name="ape2" value=<?php echo isset($_POST["ape2"]) ? $_POST["ape2"] : ""; ?>>
                </div>
            </div>
            <!-- <div class="input-group">
            </div> -->
            <div class="input-group">
                <label for="telefono">Telefono *</label>
                <input type="text" id="telefono" name="telefono" required value=<?php echo isset($_POST["telefono"]) ? $_POST["telefono"] : ""; ?>>
            </div>
            <?php echo isset($_ERROR["telefono"]) ? '<p class="register-error"> '.$_ERROR["telefono"].'</p>' : ""?>

            <div class="input-group">
                <input type="submit" value="Registrar">
            </div>
        </form>
        <div class="forgot-password">
            <a href="./../index.php">Volver a login</a>
        </div>
    </div>
</body>

</html>