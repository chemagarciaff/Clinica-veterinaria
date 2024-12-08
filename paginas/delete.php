<?php
include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

// Iniciar la sesión
session_start();

// Establecer conexión con la base de datos
connect_agenda();

// Comprobar si existe un cliente
if(isset($_GET["cliente"])){
    // Eliminar el usuario y cliente correspondiente de la base de datos
    eliminar_usuario($_GET["cliente"]);
    eliminar_cliente($_GET["cliente"]);
    
    // Redirige a la página principal del administrador
    header("Location: ./principalAdmin.php?insert=true");
    exit();
}

// Comprobar si existe una mascota
if(isset($_GET["mascota"])){
    // Eliminar la mascota correspondiente de la base de datos
    eliminar_animal($_GET["mascota"]);

    header("Location: ./principalAdmin.php?insert=true");
    exit();
}

// Comprobar si existe una vacuna
if(isset($_GET["vacuna"])){
    // Eliminar la vacuna correspondiente de la base de datos
    eliminar_vacuna($_GET["vacuna"]);

    header("Location: ./principalAdmin.php?insert=true");
    exit();
}
?>
