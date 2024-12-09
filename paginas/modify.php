<?php
include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

// Iniciar la sesión
session_start();

// Establecer la conexión con la base de datos 
connect_agenda();


// Modificación de datos de clientes
if(isset($_GET["ape1"])){

    //Para usuarios
    if(isset($_GET["typeUser"])){
        modificar_clientes($_GET["nombre"], $_GET["ape1"], $_GET["ape2"], $_GET["telefono"], $_GET["correo"], $_SESSION["user"]);
        header("Location: ./principalUser.php?modify=true");
        exit(); 

    //Para admin
    } else {
        modificar_clientes($_GET["nombre"], $_GET["ape1"], $_GET["ape2"], $_GET["telefono"], $_GET["correo"], $_GET["dni"]);
        header("Location: ./principalAdmin.php?modify=true");
        exit(); 
    }

}

// Modificación de datos de mascotas
if(isset($_GET["edad"])){

    // Llamar a la función modificar_mascota
    modificar_mascota($_GET["nombre"], $_GET["edad"], $_GET["chip"], $_GET["sexo"], $_GET["tipo_animal"], $_GET["id"]);
    header("Location: ./principalAdmin.php?modify=true");
    exit(); 
}

// Modificación de datos de vacunas
if(isset($_GET["nombre_vacuna"])){
    // Llamar a la función modificar_vacunas
    modificar_vacunas($_GET["nombre_vacuna"], $_GET["obligatoria"]);
    header("Location: ./principalAdmin.php?modify=true");
    exit();  
}

?>
