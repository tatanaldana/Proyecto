<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="..\administrador\css\bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="..\administrador\css\font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="..\administrador\css\sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="..\administrador\css\style.css">
  </head>
  <body>
  <?php
  include 'include/header.php';

  include 'forms/form_registro.php';

  include 'gestion/barra.php';

  include 'include/img_bienve.php';

    ?>


<?php 
    include 'crud/conexion.php';
    
    include 'crud/crud.php';

    include 'include/img_menu.php';

    include 'include/footer.php';
  ?> 

    </body>
</html>