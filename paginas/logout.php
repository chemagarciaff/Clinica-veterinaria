<?php
// Iniciar sesión
session_start();

// Destruir la sesión actual, eliminando toda la información almacenada
session_destroy();

// Limpiar el array de sesión
$_SESSION = [];

// Redirigir al usuario a la página principal
header("Location: ./../index.php");

exit;
?>
