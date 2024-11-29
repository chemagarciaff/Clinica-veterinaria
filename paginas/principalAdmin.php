<?PHP

include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

session_start();

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
            <h2 class="saludo">Bienvenido</h2>
            <a href="./logout.php" class="btn-logout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </header>
        <aside class="aside">
            <!------------------------INSERTAR ------------------------>
            <!-- insertar cliente-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="insertar" value="insertar">
                <button class="list__item" type="submit">Insertar cliente</button>
            </form>

            <!-- insertar mascota -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="insertar" value="insertar">
                <button class="list__item" type="submit">Insertar mascota</button>
            </form>

            <!-- insertar vacuna -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="insertar" value="insertar">
                <button class="list__item" type="submit">Insertar vacuna</button>
            </form>

             <!------------------------MODIFICAR ------------------------>
            <!-- modificar cliente-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="modificar" value="modificar">
                <button class="list__item" type="submit">Modificar cliente</button>
            </form>

            <!-- modificar mascota -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="modificar" value="modificar">
                <button class="list__item" type="submit">Modificar mascota</button>
            </form>

            
            <!-- modificar vacuna -->
            <form action="#" method="post" class="list">
                <input type="hidden" name="modificar" value="modificar">
                <button class="list__item" type="submit">Modificar vacuna</button>
            </form>

          
            <!-- eliminar cliente-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="eliminar" value="modificar">
                <button class="list__item" type="submit">Eliminar cliente</button>
            </form>

            <!-- eliminar mascota-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="eliminar" value="modificar">
                <button class="list__item" type="submit">Eliminar mascota</button>
            </form>

            <!-- eliminar vacuna-->
            <form action="#" method="post" class="list">
                <input type="hidden" name="eliminar" value="modificar">
                <button class="list__item" type="submit">Eliminar vacuna</button>
            </form>

        </aside>
        <main class="main">main</main>
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