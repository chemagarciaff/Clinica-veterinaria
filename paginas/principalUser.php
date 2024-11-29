<?PHP

include_once "./../funciones/funciones.php";
include_once "./../funciones/funciones_bd.php";

session_start();

connect_agenda();

select_cliente();

$mascotas = select_mascotas($_SESSION["user"]);

// var_dump($mascotas);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bodyUser">
    <container class="container">
        <header class="header">
            <img src="./../assets/images/logo_clinica.png" alt="" class="logo">
            <h2 class="saludo">Bienvenido <?php echo $_SESSION["nombre"] ?></h2>
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
            <?php 
            if(count($mascotas) > 0){
            ?>
             <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Dueño</th>
        <th>Tipo</th>
      </tr>
    </thead>
    <tbody id="mascotas-table-body">
      <?php
      foreach ($mascotas as $key => $mascota) {
        echo "<td>" . $mascota["nombre"] . "</td>";
        echo "<td>" . $mascota["edad"] . "</td>";
        echo "<td>" . $mascota["sexo"] . "</td>";
        echo "<td>" . $mascota["dni_duenio"] . "</td>";
        echo "<td>" . $mascota["tipo_animal"] . "</td>";
      }

      ?>
    </tbody>
  </table>
  <?php
  }else{
    echo $_SESSION['nombre'] . " aun no tienes mascotas registradas";
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