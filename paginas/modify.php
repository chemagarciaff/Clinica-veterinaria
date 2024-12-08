<?php
    include_once "./../funciones/funciones.php";
    include_once "./../funciones/funciones_bd.php";

    session_start();
    
    connect_agenda();
    print_r($_GET);

    if(isset($_GET["ape1"])){

        modificar_clientes($_GET["nombre"], $_GET["ape1"], $_GET["ape2"], $_GET["telefono"], $_GET["correo"], $_GET["dni"]);
        header("Location: ./principalAdmin.php?modify=true");
        exit();

    }
    
    if(isset($_GET["edad"])){
        modificar_mascota($_GET["nombre"], $_GET["edad"], $_GET["chip"], $_GET["sexo"], $_GET["tipo_animal"], $_GET["id"]);
        header("Location: ./principalAdmin.php?modify=true");
        exit();
    }

    if(isset($_GET["nombre_vacuna"])){
        modificar_vacunas($_GET["nombre_vacuna"], $_GET["obligatoria"]);
        header("Location: ./principalAdmin.php?modify=true");
        exit();
    }



?>