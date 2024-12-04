<?php
// funcion conectar agenda


function connect_agenda()
{
    global $pdo;
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=veterinaria', 'daw', 'daw');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    } catch (PDOException $e) {
        echo 'Error en la conexión: ' . $e->getMessage();
    }
}


// -------------------------------------------------COMPROBAR---------------------------------------


/**
 * Funcion para comprobar los usuarios
 *
 * @param [type] $user
 * @return void
 */
function comprobarUsuario($user)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            if (trim($usuario["user"]) == trim($user)) {
                return true;
            }
        }
    } catch (PDOException $excepcion) {
        echo "Usuario incorrecto";
    }
}

// funcion comprobar contraseaña
function comprobarContraseña($password)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            if ($usuario["password"] == $password) {
                return true;
            }
        }
    } catch (PDOException $excepcion) {
        echo "Contraseña incorrecta";
    }
}

// funcion comprobar coincidencia
function comprobarCoincidencia($user, $password)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            if ($usuario["password"] == $password && $usuario["user"] == $user) {
                return true;
            }
        }
    } catch (PDOException $excepcion) {
        echo "Usuario y contraseña no coinciden";
    }
}


// -------------------------------------------------INSERCCIONES---------------------------------------

// insertar usuario
function insert_user($dni, $password, $email)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO usuarios VALUES('$dni', '$password', 'R', '$email')");
        echo "Se ha añadido $filasInsertadas usuario<br />";
        return true;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
        return false;
    }
}

// insertar clientes
function insert_cliente($dni, $nombre, $ape1, $ape2, $telefono, $email)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO clientes VALUES('$dni', '$nombre', '$ape1', '$ape2', '$telefono', '$email')");
        echo "Se ha añadido $filasInsertadas cliente<br />";
        return true;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
        return false;
    }
}

// Insertar mascotas
function insert_animales($nombre, $edad, $chip, $sexo, $tipo_animal, $dni_duenio)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO animales (nombre, edad, chip, sexo, tipo_animal, dni_duenio) VALUES('$nombre', '$edad', '$chip', '$sexo', '$tipo_animal', '$dni_duenio')");
        echo "Se ha añadido $filasInsertadas animales<br />";
        return true;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción: " . $excepcion->getMessage();
        return false;
    }
}

// Insertar vacuna
function insert_vacunas($nombre_vacuna, $obligatoria)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO vacunas (nombre_vacuna, obligatoria) VALUES('$nombre_vacuna', '$obligatoria')");
        echo "Se ha añadido $filasInsertadas vacuna<br />";
        return true;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo: " . $excepcion->getMessage();
        return false;
    }
}

// -------------------------------------------------MODIFICAR---------------------------------------

// Modificar mascotas 
function modificar_mascota()
{
    global $pdo;
    try {
        $sql = "UPDATE agenda SET emailContacto='jjjj@gmail.com' WHERE emailContacto='jose@gmail.com'";
        $filasModificadas = $pdo->exec($sql);
        echo "Se han modificado $filasModificadas filas<br/>";
    } catch (PDOException $excepcion) {
        echo "Error en la modificación de tipo " . $excepcion->getMessage();
    }
}

// Modificar clientes
function modificar_clientes($nombre, $ape1, $ape2, $telefono, $correo)
{
    global $pdo;
    $dni = $_SESSION["user"];
    try {
        $sql = "UPDATE clientes SET nombre='$nombre', ape1='$ape1', ape2='$ape2', telefono='$telefono', correo='$correo' WHERE dni ='$dni'";
        $filasModificadas = $pdo->exec($sql);
        echo "Se han modificado $filasModificadas filas<br/>";
    } catch (PDOException $excepcion) {
        echo "Error en la modificación de tipo " . $excepcion->getMessage();
    }
}

// Modificar mascotas 
function modificar_vacunas()
{
    global $pdo;
    try {
        $sql = "UPDATE agenda SET emailContacto='jjjj@gmail.com' WHERE emailContacto='jose@gmail.com'";
        $filasModificadas = $pdo->exec($sql);
        echo "Se han modificado $filasModificadas filas<br/>";
    } catch (PDOException $excepcion) {
        echo "Error en la modificación de tipo " . $excepcion->getMessage();
    }
}


// -------------------------------------------------ELIMINAR---------------------------------------



// Funcion para eliminar cliente y usuario a la vez
function eliminar_cliente($dni)
{
    global $pdo;
    try {

        $sql1= "DELETE FROM clientes WHERE dni = '$dni'";
        $stmt1 = $pdo->prepare($sql1);

        $stmt1->execute();
        $filasBorradas = $stmt1->rowCount();

        if ($filasBorradas > 0) {
            echo "Se ha eliminado el contacto con DNI: $dni<br/>";
            return true;
        } else {
            echo "No se encontró ningún contacto con el DNI proporcionado.<br/>";
            return false;
        }
    } catch (PDOException $excepcion) {
        echo "Error en el borrado: " . $excepcion->getMessage();
        return false;
    }
}

function eliminar_usuario($dni)
{
    global $pdo;
    try {

        $sql2 = "DELETE FROM usuarios WHERE user = '$dni'";
        $stmt2 = $pdo->prepare($sql2);

        $stmt2->execute();
        $filasBorradas = $stmt2->rowCount();

        if ($filasBorradas > 0) {
            echo "Se ha eliminado el contacto con DNI: $dni<br/>";
            return true;
        } else {
            echo "No se encontró ningún contacto con el DNI proporcionado.<br/>";
            return false;
        }
    } catch (PDOException $excepcion) {
        echo "Error en el borrado: " . $excepcion->getMessage();
        return false;
    }
}




// Funcion para eliminar mascota
function eliminar_animal($id)
{
    global $pdo;
    try {

        $sql= "DELETE FROM animales WHERE id = '$id'";
        $stmt = $pdo->prepare($sql);

        $stmt->execute();
        $filasBorradas = $stmt->rowCount();

        if ($filasBorradas > 0) {
            echo "Se ha eliminado el animal con el ID: $id<br/>";
            return true;
        } else {
            echo "No se encontró ningún animal con el ID proporcionado.<br/>";
            return false;
        }
    } catch (PDOException $excepcion) {
        echo "Error en el borrado: " . $excepcion->getMessage();
        return false;
    }
}


// Funcion para eliminar vacuna
function eliminar_vacuna($nombre_vacuna)
{
    global $pdo;
    try {

        $sql= "DELETE FROM vacunas WHERE nombre_vacuna = '$nombre_vacuna'";
        $stmt = $pdo->prepare($sql);

        $stmt->execute();
        $filasBorradas = $stmt->rowCount();

        if ($filasBorradas > 0) {
            echo "Se ha eliminado la vacuna llamada: $nombre_vacuna<br/>";
            return true;
        } else {
            echo "No se encontró ninguna vacuna con el nombre proporcionado.<br/>";
            return false;
        }
    } catch (PDOException $excepcion) {
        echo "Error en el borrado: " . $excepcion->getMessage();
        return false;
    }
}

// -------------------------------------------------SELECCIONAR---------------------------------------
// seleccionar clientes
function select_cliente()
{
    global $pdo;
    try {
        $sql = "SELECT * FROM clientes";
        $lista = $pdo->query($sql);
        while ($cliente = $lista->fetch()) {
            if ($cliente["dni"] == $_SESSION["user"]) {
                $_SESSION["nombre"] = $cliente["nombre"];
                $_SESSION["ape1"] = $cliente["ape1"];
                $_SESSION["ape2"] = $cliente["ape2"];
                $_SESSION["telefono"] = $cliente["telefono"];
                $_SESSION["correo"] = $cliente["correo"];
            }
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}


function select_cliente2($dni)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM clientes where dni = '$dni'";
        $lista = $pdo->query($sql);
        $cliente = $lista->fetch();
        return $cliente;
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}

function select_mascotas($user)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM animales WHERE dni_duenio = '$user'";
        $lista = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        if (count($lista) > 0){
            return $lista;
        }else{
            return [];
        }
        return $lista;
    } catch (PDOException $excepcion) {
        return 'Ha ocurrido una excepcion '. $excepcion;
    }
}

function select_mascotas2($id)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM animales WHERE ID = '$id'";
        $lista = $pdo->query($sql);
        $animal = $lista->fetch();
        return $animal;
    } catch (PDOException $excepcion) {
        return 'Ha ocurrido una excepcion '. $excepcion;
    }
}

function select_vacuna2($nombre)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM vacunas WHERE nombre_vacuna = '$nombre'";
        $lista = $pdo->query($sql);
        $vacuna = $lista->fetch();
        return $vacuna;
    } catch (PDOException $excepcion) {
        return 'Ha ocurrido una excepcion '. $excepcion;
    }
}



function comprobarCambiosPerfil() {
    session_start();
    if ($_GET["nombre"] == $_SESSION["nombre"]){
        if ($_GET["ape1"] == $_SESSION["ape1"]){
            if ($_GET["ape2"] == $_SESSION["ape2"]){
                if ($_GET["telefono"] == $_SESSION["telefono"]){
                    if ($_GET["correo"] == $_SESSION["correo"]){
                        return true;
                    }else{
                        return false;
                    }
                } else{
                    return false;
                }
            } else{
                return false;
            }
        } else{
            return false;
        }
    } else {
        return false;
    }
}