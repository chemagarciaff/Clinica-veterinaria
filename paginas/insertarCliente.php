<?php
    include_once "./../funciones/funciones.php";
    include_once "./../funciones/funciones_bd.php";
    
    connect_agenda();

    insert_cliente($_GET["dni"], $_GET["nombre"], $_GET["ape1"], $_GET["ape2"], $_GET["telefono"], $_GET["correo"]);
    insert_user($_GET["dni"], $_GET["contraseña"], $_GET["correo"]);


?>