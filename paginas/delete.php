<?php
    include_once "./../funciones/funciones.php";
    include_once "./../funciones/funciones_bd.php";

    session_start();
    
    connect_agenda();

    if(isset($_GET["cliente"])){
        eliminar_usuario($_GET["cliente"]);
        eliminar_cliente($_GET["cliente"]);
        header("Location: ./principalAdmin.php?insert=true");
        exit();
    }
    
    if(isset($_GET["mascota"])){
        eliminar_animal($_GET["mascota"]);
        header("Location: ./principalAdmin.php?insert=true");
        exit();
    }

    if(isset($_GET["vacuna"])){
        eliminar_vacuna($_GET["vacuna"]);
        header("Location: ./principalAdmin.php?insert=true");
        exit();
    }

?>