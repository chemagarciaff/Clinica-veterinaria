<?php

// chequear usuarios
function chequear_usuario(){
    if (!isset($_SESSION['user'])) {
        header('Location: ../index.php');
        exit();
    }
}

// chequerar rol admin
function chequear_rol_admin($rol_admin, $ruta_user){
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != $rol_admin) {
        header('Location: ' . $ruta_user);
        exit();
}
}

// chequear rol user
function chequear_rol_user($rol_user, $ruta_admin){
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != $rol_user) {
        header('Location: ' . $ruta_admin);
        exit();
}
}



