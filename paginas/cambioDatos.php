<?php
include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";


if(comprobarCambiosPerfil()){
    header("Location: ./principalUser.php?edit=false");
    exit;
}else{
    header("Location: ./principalUser.php?edit=true");
    exit;
};


?>