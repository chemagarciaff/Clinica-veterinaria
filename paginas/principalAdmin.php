<?PHP

include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

session_start();

chequear_usuario();

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
            echo (isset($_GET["insert"]) && $_GET["insert"] == "true") ? "<p class='alert-usuarioRegistrado'>La acción se realizó correctamente</p>" : "";

            ?>


            <!-- INSERTAR -->
            <!-- insertar cliente -->
            <?php
            if (isset($_POST["insertarCliente"]) && $_POST["insertarCliente"]) { ?>
                <form action="./insert.php" method="get" class="formularioEditar">
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
                        <input type="text" id="correo" name="correo">
                    </div>
                    <div class="input-group">
                        <label for="contraseña">Contraseña</label>
                        <input type="text" id="contraseña" name="contraseña">
                    </div>


                    <button type="submit">Guardar Cambios</button>
                    <button type="reset">Mantener Cambios</button>
                </form>
            <?php } ?>


            <!-- insertar mascota -->
            <?php
            if (isset($_POST["insertarMascota"]) && $_POST["insertarMascota"]) { ?>
                <form action="./insert.php" method="post" class="formularioEditar">
                    <div class="input-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre">
                    </div>
                    <div class="input-group">
                        <label for="edad">Edad</label>
                        <input type="text" id="edad" name="edad">
                    </div>
                    <div class="radio-group">
                        <label for="chip">Chip</label>
                        <input type="radio" name="chip" id="chip" value="1">Si
                        <input type="radio" name="chip" id="chip" value="0">No
                    </div>
                    <div class="radio-group">
                        <label for="sexo">Sexo</label>
                        <input type="radio" name="sexo" id="sexo" value="F">Hembra
                        <input type="radio" name="sexo" id="sexo" value="M">Macho
                    </div>
                    <div class="input-group">
                        <label for="tipo_animal">Tipo animal</label>
                        <input type="text" id="tipo_animal" name="tipo_animal">
                    </div>
                    <div class="input-group">
                        <label for="dni_dueño">DNI dueño</label>
                        <select name="dni_dueño" id="select-insert-animal">
                            <option value="" selected disabled></option>
                            <?php
                            crearClienteOptions();
                            ?>
                        </select>
                    </div>


                    <button type="submit">Guardar Cambios</button>
                    <button type="reset">Mantener Cambios</button>
                </form>
            <?php } ?>


            <!-- insertar vacuna -->
            <?php
            if (isset($_POST["insertarVacuna"]) && $_POST["insertarVacuna"]) { ?>
                <form action="./insert.php" method="post" class="formularioEditar">
                    <div class="input-group">
                        <label for="nombre_vacuna">Nombre vacuna</label>
                        <input type="text" id="nombre_vacuna" name="nombre_vacuna">
                    </div>
                    <div class="radio-group">
                        <label for="obligatoria">Obligatoria</label>
                        <input type="radio" name="obligatoria" id="obligatoria" value="1">Si
                        <input type="radio" name="obligatoria" id="obligatoria" value="0">No
                    </div>

                    <button type="submit">Guardar Cambios</button>
                    <button type="reset">Mantener Cambios</button>
                </form>
            <?php } ?>


            <!-- MODIFICAR -->
            <!-- modificar Cliente -->
            <!-- Formulario cambio de datos del cliente -->

            <?php
            if (isset($_POST["modificarCliente"]) && $_POST["modificarCliente"]) { ?>
            <form action="./modify.php" method="get" class="formularioEditar">
                <div class="input-group">
                    <label for="cliente">Selecciona el cliente que quieres modificar</label>
                    <select name="cliente" id="select-modify-cliente">
                        <option value="" selected disabled></option>
                        <?php
                        crearClienteOptions();
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value=<?php echo (isset($_SESSION["nombre"])) ? $_SESSION["nombre"] : "" ?>>
                </div>
                <div class="input-group">
                    <label for="ape1">Primer Apellido</label>
                    <input type="text" id="ape1" name="ape1" value=<?php echo (isset($_SESSION["ape1"])) ? $_SESSION["ape1"] : "" ?>>
                </div>
                <div class="input-group">
                    <label for="ape2">Segundo Apellido</label>
                    <input type="text" id="ape2" name="ape2" value=<?php echo (isset($_SESSION["ape2"])) ? $_SESSION["ape2"] : "" ?>>
                </div>
                <div class="input-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" name="telefono" value=<?php echo (isset($_SESSION["telefono"])) ? $_SESSION["telefono"] : "" ?>>
                </div>
                <div class="input-group">
                    <label for="correo">Correo</label>
                    <input type="text" id="correo" name="correo" value=<?php echo (isset($_SESSION["correo"])) ? $_SESSION["correo"] : "" ?>>
                </div>


                <button type="submit">Guardar Cambios</button>
                <button type="reset">Mantener Cambios</button>
            </form>
            <?php } ?>



            <!-- ELIMINAR -->
            <!-- Eliminar cliente -->
            <?php
            if (isset($_POST["eliminarCliente"]) && $_POST["eliminarCliente"]) { ?>
                <form action="./delete.php" method="get" class="formularioEditar">
                    <label for="cliente">Selecciona el cliente que quieres borrar</label>
                    <select name="cliente" id="select-delete-cliente">
                        <option value="" selected disabled></option>
                        <?php
                        crearClienteOptions();
                        ?>
                    </select>

                    <br>
                    <button type="submit">Eliminar cliente</button>
                    <button type="reset">Resetear</button>
                </form>
            <?php } ?>

            <!-- Eliminar mascota -->
            <?php
            if (isset($_POST["eliminarMascota"]) && $_POST["eliminarMascota"]) { ?>
                <form action="./delete.php" method="get" class="formularioEditar">
                    <label for="mascota">Selecciona la mascota que quieres borrar</label>
                    <select name="mascota" id="select-delete-mascota">
                        <option value="" selected disabled></option>
                        <?php
                        crearMascotaOptions();
                        ?>
                    </select>

                    <br>
                    <button type="submit">Eliminar mascota</button>
                    <button type="reset">Resetear</button>
                </form>
            <?php } ?>

            <!-- Eliminar vacuna -->
            <?php
            if (isset($_POST["eliminarVacuna"]) && $_POST["eliminarVacuna"]) { ?>
                <form action="./delete.php" method="get" class="formularioEditar">
                    <label for="vacuna">Selecciona la vacuna que quieres borrar</label>
                    <select name="vacuna" id="select-delete-vacuna">
                        <option value="" selected disabled></option>
                        <?php
                        crearVacunaOptions();
                        ?>
                    </select>

                    <br>
                    <button type="submit">Eliminar vacuna</button>
                    <button type="reset">Resetear</button>
                </form>
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