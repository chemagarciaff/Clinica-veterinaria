<?php
// funcion conectar agenda

function connect_agenda()
{
    global $pdo;
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=veterinaria', 'daw', 'daw');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
        echo '<h4>Conexión establecida</h4>';
    } catch (PDOException $e) {
        echo 'Error en la conexión: ' . $e->getMessage();
    }
}

function insert_animal()
{
    global $pdo;
    try {
        $filasInsertadas = $pdo->exec("INSERT INTO animales VALUES(NULL,'José','Sánchez','jose@gmail.com','11111111')");
        echo "Se han añadido $filasInsertadas filas<br />";
    } catch (PDOException $excepcion) {
        echo "Error en la inserción de tipo " . $excepcion->getMessage();
    }
}

// consultas
function select_agenda()
{
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            echo "Nombre: " . $usuario['user'];
            echo "password: " . $usuario['password'];
        }
    } catch (PDOException $excepcion) {
        echo "Error en la consulta de tipo " . $excepcion->getMessage();
    }
}


function comprobarUsuario ($user) {
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            if(trim($usuario["user"]) == trim($user)){   
                return true;
            }
        }
    } catch (PDOException $excepcion) {
        echo "Usuario incorrecto";
    }
}

function comprobarContraseña ($password) {
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            if($usuario["password"] == $password){
                return true;
            }
        }
    } catch (PDOException $excepcion) {
        echo "Contraseña incorrecta";
    }
}

function comprobarCoincidencia($user, $password) {
    global $pdo;
    try {
        $sql = "SELECT * FROM usuarios";
        $lista = $pdo->query($sql);
        while ($usuario = $lista->fetch()) {
            if($usuario["password"] == $password && $usuario["user"] == $user){
                return true;
            }
        }
    } catch (PDOException $excepcion) {
        echo "Usuario y contraseña no coinciden";
    }
}

// hacemos una modificación en los datos del contacto 
function modify_agenda()
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

// para eliminar contactos

// try {
//     $sql = "DELETE FROM agenda WHERE nombreContacto='Lucas'";
//     $filasBorradas = $pdo->exec($sql);
//     echo "Se han borrado $filasBorradas filas<br/>";
// } catch (PDOException $excepcion) {
//     echo "Error en el borrado de tipo " . $excepcion->getMessage();
// }
