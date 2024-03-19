<?php
require_once '../../model/usuario.php';

usuario::verificarSesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../public/css/style.css">
  </head>
  <body>
  <?php
  include 'include/header.php';
  ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Gestion</li>
  </ol>
</nav>
<div class="my-5"></div>
  <?php

  echo '<div class="my-5"></div>';

  include 'gestion/barra.php';

  echo '<div class="my-5"></div>';
  
  include 'include/img_gestion.php';

  include 'include/img_menu.php';

<<<<<<< Updated upstream
  include 'include/footer.php';
=======

<?php 
   

    include 'include/img_menu.php';

    include 'include/footer.php';
>>>>>>> Stashed changes
  ?> 


</body>
</html>

    </body>
</html>