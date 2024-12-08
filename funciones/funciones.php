<?php

/**
 * Verifica si el usuario está autenticado en la sesión.
 * Si no está autenticado, redirige a la página principal.
 */
function chequear_usuario() {
    if (!isset($_SESSION['user'])) {
        header('Location: ../index.php');
        exit();
    }
}

/**
 * Verifica si el usuario tiene el rol adecuado.
 * Si el rol no coincide, redirige a la ruta espcificada.
 *
 * @param int $rol El rol que se espera (A o R).
 * @param string $ruta La ruta a la que se redirige si no tiene el rol adecuado.
 */
function chequear_rol($rol, $ruta) {
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != $rol) {
        header('Location: ' . $ruta);
        exit();
    }
}

/**
 * Crea las opciones del desplegable de clientes en un formulario.
 * Obtiene todos los clientes de la base de datos y los muestra como opciones.
 */
function crearClienteOptions() {
    global $pdo;
    try {
        $sql = "SELECT * FROM clientes";
        $lista = $pdo->query($sql);
        while ($cliente = $lista->fetch()) {
            echo "<option value = " . $cliente["dni"] . ">" . $cliente["dni"] . " - " . $cliente["nombre"] . " " . $cliente["ape1"] . "</option>";
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}

/**
 * Crea las opciones del desplegable de mascotas en un formulario.
 * Obtiene todas las mascotas de la base de datos y las muestra como opciones.
 */
function crearMascotaOptions() {
    global $pdo;
    try {
        $sql = "SELECT * FROM animales";
        $lista = $pdo->query($sql);
        while ($animal = $lista->fetch()) {
            echo "<option value = " . $animal["ID"] . ">" . $animal["dni_duenio"] . " - " . $animal["nombre"] . "</option>";
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}

/**
 * Crea las opciones del desplegable de vacunas en un formulario.
 * Obtiene todas las vacunas de la base de datos y las muestra como opciones.
 */
function crearVacunaOptions() {
    global $pdo;
    try {
        $sql = "SELECT * FROM vacunas";
        $lista = $pdo->query($sql);
        while ($vacuna = $lista->fetch()) {
            echo "<option value = " . $vacuna["nombre_vacuna"] . ">" . $vacuna["nombre_vacuna"] . "</option>";
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}

/**
 * Muestra las mascotas.
 * Cada mascota se muestra en una fila con sus datos: nombre, edad, sexo, chip, tipo de animal.
 *
 * @param array $mascotas Un array asociativo con los datos de las mascotas.
 */
function mostrarMascotas($mascotas) {
    foreach ($mascotas as $indice => $info) {
        // Crea una nueva fila para cada mascota
        echo "<tr>";
        echo "<td>" . $info["nombre"] . "</td>"; 
        echo "<td>" . $info["edad"] . "</td>";  
        echo "<td>" . $info["sexo"] . "</td>"; 
        echo "<td>" . $info["chip"] . "</td>"; 
        echo "<td>" . $info["tipo_animal"] . "</td>";
        echo "</tr>";   
    }
}
