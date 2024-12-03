<?php
    include_once "./../funciones/funciones.php";
    include_once "./../funciones/funciones_bd.php";

    session_start();

    // chequear_usuario();
    
    connect_agenda();

    // Clientes y usuarios
    if (isset($_GET["dni"])) {
        insert_cliente($_GET["dni"], $_GET["nombre"], $_GET["ape1"], $_GET["ape2"], $_GET["telefono"], $_GET["correo"]);
        insert_user($_GET["dni"], $_GET["contraseña"], $_GET["correo"]);
        header("Location: ./principalAdmin.php?insert=true");
        exit;
    }
    // mascotas
    if (!empty($_POST["nombre"]) && !empty($_POST["edad"]) && !empty($_POST["chip"]) && !empty($_POST["sexo"]) && !empty($_POST["tipo_animal"]) && !empty($_POST["dni_dueño"])) {
        insert_animales($_POST["nombre"], $_POST["edad"], $_POST["chip"], $_POST["sexo"], $_POST["tipo_animal"], $_POST["dni_dueño"]);
        header("Location: ./principalAdmin.php?insert=true");
        exit;
    } 

     // vacuna
     if (isset($_POST["nombre_vacuna"])) {
        insert_vacunas($_POST["nombre_vacuna"], $_POST["obligatoria"]);
        header("Location: ./principalAdmin.php?insert=true");
        exit;
    }

?>