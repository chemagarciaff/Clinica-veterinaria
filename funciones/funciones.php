<?php

include_once "./funciones/funciones_bd.php";

function comprobarUsuarios ($usuario, $password) {
    connect_agenda();
    if(comprobarUsuario($usuario)){
        
        if(comprobarContraseña($password)){
        
            if(comprobarCoincidencia($usuario, $password)){

                echo "coincide";
                return true;
            }else {
                return false;
            }
        } else {
            return false;
        }
    }else{
        return false;
    }
}









?>