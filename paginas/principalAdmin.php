<?PHP

include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

session_start();

chequear_usuario();

// variables para la autenticacion de admin
$rol_admin = "A";
$ruta_user = "./principalUser.php";

// variables para la autenticacion de registrado
$rol_user = "R";
$ruta_admin = "./principalAdmin.php";

// Funciones roles
chequear_rol_admin($rol_admin, $ruta_user);
chequear_rol_user($rol_user, $ruta_admin);

connect_agenda();

select_cliente();


if (isset($_POST["editar"])) {

    if ($_POST["editar"]) {
        echo "editar";
    }
}
if (isset($_POST["consultar"])) {

    if ($_POST["consultar"]) {
        echo "consultar";
    }
}
if (isset($_POST["eliminar"])) {

    if ($_POST["eliminar"]) {
        echo "eliminar";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Administrador</title>
</head>

<body class="bodyAdmin">
    <container class="container">
        <header class="header">
            <img src="./../assets/images/logo_clinica.png" alt="" class="logo">
            <h2 class="saludo">Bienvenido Admin</h2>
            <a href="./logout.php" class="btn-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </header>
        <aside class="aside">
            <!------------------------INSERTAR ------------------------>
            <!-- insertar cliente-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="insertarCliente" value="insertar">
                <button class="list__item" type="submit">Insertar cliente</button>
            </form>

            <!-- insertar mascota -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="insertarMascota" value="insertar">
                <button class="list__item" type="submit">Insertar mascota</button>
            </form>

            <!-- insertar vacuna -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="insertarVacuna" value="insertar">
                <button class="list__item" type="submit">Insertar vacuna</button>
            </form>

             <!------------------------MODIFICAR ------------------------>
            <!-- modificar cliente-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="modificarCliente" value="modificar">
                <button class="list__item" type="submit">Modificar cliente</button>
            </form>

            <!-- modificar mascota -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="modificarMascota" value="modificar">
                <button class="list__item" type="submit">Modificar mascota</button>
            </form>

            
            <!-- modificar vacuna -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="modificarVacuna" value="modificar">
                <button class="list__item" type="submit">Modificar vacuna</button>
            </form>

          
            <!-- eliminar cliente-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="eliminarCliente" value="modificar">
                <button class="list__item" type="submit">Eliminar cliente</button>
            </form>

            <!-- eliminar mascota-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="eliminarMascota" value="modificar">
                <button class="list__item" type="submit">Eliminar mascota</button>
            </form>

            <!-- eliminar vacuna-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="eliminarVacuna" value="modificar">
                <button class="list__item" type="submit">Eliminar vacuna</button>
            </form>

        </aside>
        <main class="main">
            <?php
                if(isset($_POST["insertarCliente"]) && $_POST["insertarCliente"]) { ?>
                    <form action="./insertarCliente.php" method="get" class="formularioEditar">
                        <div class="input-group">
                            <label for="nombre">DNI</label>
                            <input type="text" id="dni" name="dni">
                        </div>
                        <div class="input-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre">
                        </div>
                        <div class="input-group">
                            <label for="ape1">Primer Apellido</label>
                            <input type="text" id="ape1" name="ape1">
                        </div>
                        <div class="input-group">
                            <label for="ape2">Segundo Apellido</label>
                            <input type="text" id="ape2" name="ape2">
                        </div>
                        <div class="input-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" id="telefono" name="telefono">
                        </div>
                        <div class="input-group">
                            <label for="correo">Correo</label>
                            <input type="text" id="correo" name="correo" >
                        </div>
                        <div class="input-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="text" id="contraseña" name="contraseña" >
                        </div>

                        
                        <button type="submit">Guardar Cambios</button>
                        <button type="reset">Mantener Cambios</button>
                    </form>
                <?php } ?>

                <?php
                if(isset($_POST["insertarMascota"]) && $_POST["insertarMascota"]) { ?>
                    <!-- <form action="./insertarCliente.php" method="get" class="formularioEditar">
                        <div class="input-group">
                            <label for="nombre">DNI</label>
                            <input type="text" id="dni" name="dni">
                        </div>
                        <div class="input-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre">
                        </div>
                        <div class="input-group">
                            <label for="ape1">Primer Apellido</label>
                            <input type="text" id="ape1" name="ape1">
                        </div>
                        <div class="input-group">
                            <label for="ape2">Segundo Apellido</label>
                            <input type="text" id="ape2" name="ape2">
                        </div>
                        <div class="input-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" id="telefono" name="telefono">
                        </div>
                        <div class="input-group">
                            <label for="correo">Correo</label>
                            <input type="text" id="correo" name="correo" >
                        </div>
                        <div class="input-group">
                            <label for="contraseña">Contraseña</label>
                            <input type="text" id="contraseña" name="contraseña" >
                        </div>

                        
                        <button type="submit">Guardar Cambios</button>
                        <button type="reset">Mantener Cambios</button>
                    </form> -->
                <?php } ?>
        </main>
        <footer class="footer">
            <div class="footer-content">
                <p class="text__footer">2024 Clínica Veterinaria</p>
                <p class="text__footer">Avenida del Principe Nº 12, Talavera de la Reina</p>
                <p class="text__footer">Teléfono: 123-456-789</p>
                <p class="text__footer">Email: contacto@clinicaveterinaria.com</p>
            </div>
        </footer>

    </container>
</html>