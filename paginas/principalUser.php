<?PHP

include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

session_start();

connect_agenda();

select_cliente();

// eliminar_cliente('04857857G');
// eliminar_vacuna();

// echo $_SESSION["nombre"];
// echo $_SESSION["ape1"];
// echo $_SESSION["ape2"];
// echo $_SESSION["telefono"];
// echo $_SESSION["correo"];



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
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="./../estilos/style.css">
</head>

<body class="bodyUser">
    <container class="container">
        <header class="header">
            <img src="./../assets/images/logo_clinica.png" alt="" class="logo">
            <h2 class="saludo">Bienvenido <?php echo $_SESSION["nombre"] ?></h2>
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
</body>

</html>