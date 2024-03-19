<?php
require_once '../../model/usuario.php';

usuario::verificarSesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sugerencias</title>
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
    <li class="breadcrumb-item active" aria-current="page">Sugerencias</li>
  </ol>
</nav>
<?php
    include 'include/img_sugerencias.php';
  ?>
<form id="formmostrar">
<div class="container">
<div class="contenedor-busqueda" id="contenedor-busqueda">
<div class="mx-auto" style="width:300px">
<div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Ingrese el documento" aria-label="Buscar" aria-describedby="search-addon" name="buscar" id="buscar"required/>
  <button type="button" class="btn btn-outline-primary" name="btnbuscar" id="btnbuscar">Buscar</button>
</div>
</div>
</div>
</div>
</form>
<div class="my-5"></div>
<div class="container">
<div class="d-flex justify-content-center">
<div class="row">
<div class="col-md-12 table-responsive" >
   <table class="table table-bordered border-primary" style="text-align:center" >
    <thead>
        <tr>
        <th scope="col">Seleccionar</th>
        <th scope="col">Cedula</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Radicado</th>
        <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody id="filasTabla">
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-around">
            <div class="row">
            <table class="table-responsive">
                <tr>
                    <td><a class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a class="btn btn-primary" id="editButton">Responder</a></td>
                </tr> 
            </table>
            </div>
        </div>
    </div>
  <?php

    include 'include/img_menu.php';

    include 'include/footer.php';
  ?> 
  <script src="../public/js/jquery.js"></script>

  <script src="../public/js/sweetalert.min.js"></script>
  <!-- Js usuarios -->
  <script src="../public/js/sugerencias.js"></script>
<!-- Js botones -->
  <script src="../public/js/buttonspqr.js"></script>
  </body>
</html>