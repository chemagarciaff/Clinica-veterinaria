<?PHP

include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

session_start();

connect_agenda();

select_cliente();

// echo $_SESSION["nombre"];
// echo $_SESSION["ape1"];
// echo $_SESSION["ape2"];
// echo $_SESSION["telefono"];
// echo $_SESSION["correo"];




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
        <aside class="aside">aside</aside>
        <main class="main">main</main>
        <footer class="footer">footer</footer>
    </container>
</body>

</html>