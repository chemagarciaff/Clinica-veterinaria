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


function crearClienteOptions() {
    global $pdo;
    try {
        $sql = "SELECT * FROM clientes";
        $lista = $pdo->query($sql);
        while ($cliente = $lista->fetch()) {
            echo "<option value = " . $cliente["dni"] . ">".$cliente["dni"] ." - " . $cliente["nombre"] ." " . $cliente["ape1"] . "</option>";
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}

function crearMascotaOptions() {
    global $pdo;
    try {
        $sql = "SELECT * FROM animales";
        $lista = $pdo->query($sql);
        while ($animal = $lista->fetch()) {
            echo "<option value = " . $animal["ID"] . ">".$animal["ID"] ." - " . $animal["nombre"] . "</option>";
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}

function crearVacunaOptions() {
    global $pdo;
    try {
        $sql = "SELECT * FROM vacunas";
        $lista = $pdo->query($sql);
        while ($vacuna = $lista->fetch()) {
            echo "<option value = " . $vacuna["nombre_vacuna"] . ">".$vacuna["nombre_vacuna"] . "</option>";
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}


function mostrarMascotas($mascotas) {
    foreach ($mascotas as $indice => $info) {
 
     echo "<tr>";
     echo "<td>" . $info["nombre"] . "</td>";
     echo "<td>" . $info["edad"] . "</td>";
     echo "<td>" . $info["sexo"] . "</td>";
     echo "<td>" . $info["chip"] . "</td>";
     echo "<td>" . $info["tipo_animal"] . "</td>";
     echo "</tr>";   
 }
 }
