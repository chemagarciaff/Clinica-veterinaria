<?php
include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";
session_start();

chequear_usuario();

connect_agenda();

if(comprobarCambiosPerfil() || trim($_GET["nombre"]) == "" || trim($_GET["ape1"]) == "" || trim($_GET["ape2"]) == ""  || trim($_GET["telefono"]) == "" || trim($_GET["correo"]) == ""){
    header("Location: ./principalUser.php?edit=false");
    exit;
}else{
    modificar_clientes($_GET["nombre"], $_GET["ape1"], $_GET["ape2"], $_GET["telefono"], $_GET["correo"]);
    header("Location: ./principalUser.php?edit=true");
    exit;
};


?>