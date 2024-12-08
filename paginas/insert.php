<?php
include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

// Iniciar la sesión
session_start();

// Establecer conexión con la base de datos
connect_agenda();

// **Clientes y usuarios**
// Comprobar si el dni existe
if (isset($_GET["dni"])) {
    // Insertar un nuevo cliente y un nuevo usuario
    insert_cliente($_GET["dni"], $_GET["nombre"], $_GET["ape1"], $_GET["ape2"], $_GET["telefono"], $_GET["correo"]);
    insert_user($_GET["dni"], $_GET["contraseña"], $_GET["correo"]);
    
    // Redirige a la página principal del administrador
    header("Location: ./principalAdmin.php?insert=true");
    exit;
}

// **Mascotas**
// Comprobar si todos los campos necesarios para insertar una mascota están completos
if (!empty($_POST["nombre"]) && !empty($_POST["edad"]) && !empty($_POST["chip"]) && !empty($_POST["sexo"]) && !empty($_POST["tipo_animal"]) && !empty($_POST["dni_dueño"])) {
    // Insertar una nueva mascota utilizando los datos del formulario
    insert_animales($_POST["nombre"], $_POST["edad"], $_POST["chip"], $_POST["sexo"], $_POST["tipo_animal"], $_POST["dni_dueño"]);
    

    header("Location: ./principalAdmin.php?insert=true");
    exit;
}

// **Vacunas**
// Comprobar si el nombre de la vacuna ya existe
if (isset($_POST["nombre_vacuna"])) {
    // Insertar una nueva vacuna
    insert_vacunas($_POST["nombre_vacuna"], $_POST["obligatoria"]);
    

    header("Location: ./principalAdmin.php?insert=true");
    exit;
}
?>
