<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
  <?php
  include '../include/header.php';

    ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="../ventas.php">Ventas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Preparacion</li>
  </ol>
</nav>
<form method="POST">
<div class="container">
<div class="contenedor-busqueda" id="contenedor-busqueda">
<div class="mx-auto" style="width:300px">
<div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Ingrese el documento" aria-label="Buscar" aria-describedby="search-addon" name="txtbuscar"/>
  <button type="submit" class="btn btn-outline-primary" name="btnbuscar">Buscar</button>
</div>
</div>
</div>
</div>
</form>
<div class="my-5"></div>

<?php 
    include '../crud/conexion.php';

    include '../crud_ventas/botones.php';

    include '../forms/form_ventas2.php';

    include '../include/img_menu.php';

    include '../include/footer.php';
  ?> 

    </body>
</html>