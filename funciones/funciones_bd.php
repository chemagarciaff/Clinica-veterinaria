<?php
/**
 * Conecta la aplicación a la base de datos utilizando PDO.
 *
 * @return void
 */
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
 * Comprueba si un usuario existe.
 *
 * @param string $user Nombre de usuario a comprobar.
 * @return bool True si el usuario existe, false si no.
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
    return false;
}

/**
 * Comprueba si una contraseña existe.
 *
 * @param string $password Contraseña a comprobar.
 * @return bool True si la contraseña existe, false si no.
 */
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
    return false;
}

/**
 * Comprueba si un usuario y contraseña coinciden.
 *
 * @param string $user Nombre de usuario.
 * @param string $password Contraseña del usuario.
 * @return bool True si coinciden, false si no.
 */
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
    return false;
}

/**
 * Comprueba si un usuario con un DNI específico está registrado.
 *
 * @param string $dni DNI del usuario.
 * @return bool True si el usuario no está registrado, false si lo está.
 */
function comprobarUsuarioRegistrado($dni)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            if ($usuario["user"] == $dni) {
                return false;
            }
        }
        return true;
    } catch (PDOException $excepcion) {
        echo "Error al comprobar usuario registrado: " . $excepcion->getMessage();
    }
    return false;
}

// -------------------------------------------------INSERCCIONES---------------------------------------

/**
 * Inserta un nuevo usuario.
 *
 * @param string $dni DNI del usuario.
 * @param string $password Contraseña del usuario.
 * @param string $email Correo electrónico del usuario.
 * @return bool True si se insertó correctamente, false en caso contrario.
 */
function insert_user($dni, $password, $email)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO usuarios VALUES('$dni', '$password', 'R', '$email')");
        echo "Se ha añadido $filasInsertadas usuario<br />";
        return true;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo: " . $excepcion->getMessage();
        return false;
    }
}

/**
 * Inserta un cliente.
 *
 * @param string $dni DNI del cliente.
 * @param string $nombre Nombre del cliente.
 * @param string $ape1 Primer apellido.
 * @param string $ape2 Segundo apellido.
 * @param string $telefono Teléfono del cliente.
 * @param string $email Correo electrónico del cliente.
 * @return bool True si se insertó correctamente, false si no.
 */
function insert_cliente($dni, $nombre, $ape1, $ape2, $telefono, $email)
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO clientes VALUES('$dni', '$nombre', '$ape1', '$ape2', '$telefono', '$email')");
        echo "Se ha añadido $filasInsertadas cliente<br />";
        return true;
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo: " . $excepcion->getMessage();
        return false;
    }
}
 

/**
 * Inserta un nuevo animal.
 *
 * @param string $nombre Nombre del animal.
 * @param int $edad Edad del animal.
 * @param string $chip Número de chip del animal.
 * @param string $sexo Sexo del animal (Macho/Hembra).
 * @param string $tipo_animal Tipo de animal (Perro, Gato, etc.).
 * @param string $dni_duenio DNI del dueño del animal.
 * @return bool True si se insertó correctamente, False en caso contrario.
 */
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

/**
 * Inserta una nueva vacuna.
 *
 * @param string $nombre_vacuna Nombre de la vacuna.
 * @param bool $obligatoria Indica si la vacuna es obligatoria (1 para sí, 0 para no).
 * @return bool True si se insertó correctamente, False en caso contrario.
 */
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

/**
 * Modifica los datos de una mascota.
 *
 * @param string $nombre Nuevo nombre de la mascota.
 * @param int $edad Nueva edad de la mascota.
 * @param string $chip Nuevo chip de la mascota.
 * @param string $sexo Nuevo sexo de la mascota.
 * @param string $tipo_animal Nuevo tipo de animal.
 * @param int $id ID de la mascota a modificar.
 * @return void
 */
function modificar_mascota($nombre, $edad, $chip, $sexo, $tipo_animal, $id)
{
    global $pdo;
    try {
        $sql = "UPDATE animales SET nombre='$nombre', edad='$edad', chip='$chip', sexo='$sexo', tipo_animal='$tipo_animal' WHERE id ='$id'";
        $filasModificadas = $pdo->exec($sql);
        echo "Se han modificado $filasModificadas filas<br/>";
    } catch (PDOException $excepcion) {
        echo "Error en la modificación de tipo " . $excepcion->getMessage();
    }
}

/**
 * Modifica los datos de un cliente.
 *
 * @param string $nombre Nuevo nombre del cliente.
 * @param string $ape1 Nuevo primer apellido del cliente.
 * @param string $ape2 Nuevo segundo apellido del cliente.
 * @param string $telefono Nuevo teléfono del cliente.
 * @param string $correo Nuevo correo del cliente.
 * @param string $dni DNI del cliente a modificar.
 * @return void
 */
function modificar_clientes($nombre, $ape1, $ape2, $telefono, $correo, $dni)
{
    global $pdo;
    try {
        $sql = "UPDATE clientes SET nombre='$nombre', ape1='$ape1', ape2='$ape2', telefono='$telefono', correo='$correo' WHERE dni ='$dni'";
        $filasModificadas = $pdo->exec($sql);
        echo $filasModificadas;
    } catch (PDOException $excepcion) {
    }
}

/**
 * Modifica los datos de una vacuna.
 *
 * @param string $nombre Nombre de la vacuna a modificar.
 * @param bool $obligatoria Indica si la vacuna es obligatoria (1 para sí, 0 para no).
 * @return void
 */
function modificar_vacunas($nombre, $obligatoria)
{
    global $pdo;
    try {
        $sql = "UPDATE vacunas SET obligatoria='$obligatoria' WHERE nombre_vacuna ='$nombre'";
        $filasModificadas = $pdo->exec($sql);
    } catch (PDOException $excepcion) {
    }
}

// -------------------------------------------------ELIMINAR--------------------------------------- 

/**
 * Elimina un cliente de la base de datos por su DNI.
 *
 * @param string $dni DNI del cliente a eliminar.
 * @return bool True si se eliminó correctamente, False si no se encontró el cliente.
 */
function eliminar_cliente($dni)
{
    global $pdo;
    try {
        $sql1 = "DELETE FROM clientes WHERE dni = '$dni'";
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

/**
 * Elimina un usuario de la base de datos por su DNI.
 *
 * @param string $dni DNI del usuario a eliminar.
 * @return bool True si se eliminó correctamente, False si no se encontró el usuario.
 */
function eliminar_usuario($dni)
{
    global $pdo;
    try {
        $sql2 = "DELETE FROM usuarios WHERE user = '$dni'";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
        $filasBorradas = $stmt2->rowCount();

        if ($filasBorradas > 0) {
            echo "Se ha eliminado el usuario con DNI: $dni<br/>";
            return true;
        } else {
            echo "No se encontró ningún usuario con el DNI proporcionado.<br/>";
            return false;
        }
    } catch (PDOException $excepcion) {
        echo "Error en el borrado: " . $excepcion->getMessage();
        return false;
    }
}

/**
 * Elimina un animal de la base de datos por su ID.
 *
 * @param int $id ID del animal a eliminar.
 * @return bool True si se eliminó correctamente, False si no se encontró el animal.
 */
function eliminar_animal($id)
{
    global $pdo;
    try {
        $sql = "DELETE FROM animales WHERE id = '$id'";
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

/**
 * Elimina una vacuna de la base de datos por su nombre.
 *
 * @param string $nombre_vacuna Nombre de la vacuna a eliminar.
 * @return bool True si se eliminó correctamente, False si no se encontró la vacuna.
 */
function eliminar_vacuna($nombre_vacuna)
{
    global $pdo;
    try {
        $sql = "DELETE FROM vacunas WHERE nombre_vacuna = '$nombre_vacuna'";
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

/**
 * Selecciona los datos del cliente actual desde la base de datos y los almacena en la sesión.
 *
 * @return void
 */
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

/**
 * Selecciona los datos de un cliente por su DNI.
 *
 * @param string $dni DNI del cliente a consultar.
 * @return array Los datos del cliente.
 */
function select_cliente2($dni)
{
    global $pdo;
    try {
        $sql = "SELECT * FROM clientes WHERE dni = '$dni'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cliente;
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}



/**
 * Obtiene las mascotas de un usuario por su DNI.
 * 
 * @param string $user El DNI del dueño de las mascotas.
 * @return array[] Lista de mascotas asociadas al usuario. Si no hay mascotas, devuelve un arreglo vacío.
 */
function select_mascotas($user)
{
    global $pdo;
    try {
        // Consulta SQL para obtener todas las mascotas del dueño identificado por el DNI ($user)
        $sql = "SELECT * FROM animales WHERE dni_duenio = '$user'";
        // Ejecuta la consulta y obtiene todos los resultados
        $lista = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // Si hay resultados, los devuelve; si no, devuelve un arreglo vacío
        if (count($lista) > 0){
            return $lista;
        } else {
            return [];
        }
    } catch (PDOException $excepcion) {
        // En caso de error, devuelve el mensaje de la excepción
        return 'Ha ocurrido una excepcion '. $excepcion;
    }
}

/**
 * Obtiene los datos de una mascota específica por su ID.
 * 
 * @param int $id El ID de la mascota.
 * @return array|null Datos de la mascota si se encuentra, null si no se encuentra.
 */
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

/**
 * Obtiene los datos de una vacuna por su nombre.
 * 
 * @param string $nombre El nombre de la vacuna.
 * @return array|null Datos de la vacuna si se encuentra, null si no se encuentra.
 */
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

/**
 * Compara los datos del perfil actual con los datos almacenados en la sesión para verificar si hay cambios.
 * 
 * @return bool Devuelve true si no hay cambios en el perfil, false si hay algún cambio.
 */
function comprobarCambiosPerfil() {
    session_start();
    if ($_GET["nombre"] == $_SESSION["nombre"]){
        if ($_GET["ape1"] == $_SESSION["ape1"]){
            if ($_GET["ape2"] == $_SESSION["ape2"]){
                if ($_GET["telefono"] == $_SESSION["telefono"]){
                    if ($_GET["correo"] == $_SESSION["correo"]){
                        // Si todos los valores coinciden, no hay cambios
                        return true;
                    } else {
                        // Si el correo ha cambiado
                        return false;
                    }
                } else{
                    // Si el teléfono ha cambiado
                    return false;
                }
            } else{
                // Si el apellido 2 ha cambiado
                return false;
            }
        } else{
            // Si el apellido 1 ha cambiado
            return false;
        }
    } else {
        // Si el nombre ha cambiado
        return false;
    }
}
