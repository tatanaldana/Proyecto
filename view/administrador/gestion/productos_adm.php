<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador - Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../../public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../../public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../../public/css/styles.css">
  </head>
  <body>
  <?php

require_once("../../../model/conexion.php");

// Crear instancia de la clase Conexion
$conexion = new Conexion();
// Establecer la conexión
$conexion->conexion();

  include '../include/header.php';

  
  ?> 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../gestion.php">Gestion</a></li>
    <li class="breadcrumb-item active" aria-current="page">Productos</li>
  </ol>
</nav>
<form method="POST">
<div class="container">
<div class="mx-auto" style="width:300px">
<div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Ingrese el documento" aria-label="Buscar" aria-describedby="search-addon" name="txtbuscar"/>
  <div class="d-flex justify-content-around">
  <button type="submit" class="btn btn-outline-primary my-5" name="btnbuscar">Buscar</button>
</div>
</div>
</div>
</form>
<div class="my-5"></div>
<br><br>

<?php
  include '../forms/form_prod.php';

  include '../gestion/productos/tabla_prod.php';

  include '../gestion/productos/botones.php';

  include '../include/img_menu.php';

  include '../include/footer.php';

  ?> 

    </body>
</html>