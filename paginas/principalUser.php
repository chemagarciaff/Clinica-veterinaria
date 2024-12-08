<?PHP

include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

// Iniciar la sesión
session_start();

// Verificar si el usuario está autenticado
chequear_usuario();

// Verificar si el usuario tiene el rol de registrado ('R'), si no va a la página principal de admin
chequear_rol('R', './principalAdmin.php');

// Establecer la conexión con la base de datos 
connect_agenda();


// Seleccionar los datos del cliente
select_cliente();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./../estilos/style.css">
</head>

<body class="bodyUser">
    <container class="container">
        <header class="header">
            <img src="./../assets/images/logo_clinica.png" alt="" class="logo">
            <h2 class="saludo">Bienvenido <?php echo $_SESSION["nombre"] . " " . $_SESSION["ape1"] ?></h2>
            <a href="./logout.php" class="btn-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>

            

        </header>
        <aside class="aside">
            <form action="#" method="post" class="list">
                <input type="hidden" name="editar" value="editar">
                <button class="list__item" type="submit">Editar Datos Usuario</button>
            </form>
            <form action="#" method="post" class="list">
                <input type="hidden" name="consultar" value="consultar">
                <button class="list__item" type="submit">Consultar Mascotas</button>
            </form>
        </aside>
        <main class="main">

            <?php echo ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["edit"]) && $_GET["edit"] == "false") ? "<p class='cambios'>No hay cambios que realizar</p>" : ""  ?>
            <?php echo ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["edit"]) && $_GET["edit"] == "true") ? "<p class='cambios'>Cambios realizados</p>" : ""  ?>

            <?php echo (!isset($_POST["editar"]) && !isset($_POST["consultar"])) ? "<p class='opcion'>Elige una opcion...</p>" : "" ?>

            <?php if (isset($_POST["editar"])){     ?>


            <!-- Formulario cambio de datos del cliente -->
            <form action="./cambioDatos.php" method="get" class="formularioEditar">
                <div class="input-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value=<?php echo (isset($_SESSION["nombre"])) ? $_SESSION["nombre"] : ""?>>
                </div>
                <div class="input-group">
                    <label for="ape1">Primer Apellido</label>
                    <input type="text" id="ape1" name="ape1" value=<?php echo (isset($_SESSION["ape1"])) ? $_SESSION["ape1"] : ""?>>
                </div>
                <div class="input-group">
                    <label for="ape2">Segundo Apellido</label>
                    <input type="text" id="ape2" name="ape2" value=<?php echo (isset($_SESSION["ape2"])) ? $_SESSION["ape2"] : ""?>>
                </div>
                <div class="input-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" id="telefono" name="telefono" value=<?php echo (isset($_SESSION["telefono"])) ? $_SESSION["telefono"] : ""?>>
                </div>
                <div class="input-group">
                    <label for="correo">Correo</label>
                    <input type="text" id="correo" name="correo" value=<?php echo (isset($_SESSION["correo"])) ? $_SESSION["correo"] : ""?>>
                </div>

                
                <button type="submit">Guardar Cambios</button>
                <button type="reset">Mantener Cambios</button>
            </form>



            <?php }elseif (isset($_POST["consultar"])){  

                $mascotas = select_mascotas($_SESSION["user"]);
           
                if(count($mascotas) > 0){
            ?>
             <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Chip</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody id="mascotas-table-body">
                    <?php
                    mostrarMascotas($mascotas);
                    ?>
                </tbody>
            </table>
            <?php
            }else{
                echo $_SESSION['nombre'] . " aun no tienes mascotas registradas";
            }
        }
  ?>

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
</body>

</html>