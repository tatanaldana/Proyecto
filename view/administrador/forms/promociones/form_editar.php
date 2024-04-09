<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Editar promocion</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="../../../public/css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario -->
  <link rel="stylesheet" href="../../../public/css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="../../../public/css/styles.css">
  <!-- Personalizado daniel  -->
</head>

<?php
include("../../include/header.php");
?>


<!-- miga de pan -->
<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="../../gestion.php">Gestion</a></li>
              <li class="breadcrumb-item"><a href="../promociones.php">Promociones</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar Promociones </li>
            </ol>
          </nav>
<!-- Espacio en blanco -->

<body>
  <!-- Espacio en blanco -->
  <div class="my-5"></div>
<div class="my-5"></div>
<div class='container'>
  <div class='d-flex justify-content-center'>
    <div class='row'>
      <div class='col-md-12 table-responsive'>
        <form id='editarpromo'>
          <table class='table table-bordered border-primary' style='text-align:center'>
            <tr>
              <th scope='col' colspan='3'>Nombre Promocion</th>
              <th><input type='text' name='nombre_prom' id="nombre_prom"></th>
              <th scope='col' colspan='3'>Codigo de promocion</th>
              <th><input type='text' name='Idpromo' id="Idpromo"></th>
            </tr>
          </table>
          <div class='my-5'></div>
          <table class='table table-bordered border-primary' style='text-align:center'>
            <tbody id='TablaPromo'>
              <!-- Aquí se generará la tabla dinámica -->
            </tbody>
            <tr>
              <input type="hidden" id="doc_hidden" name="id_promo">
            </tr>
            <tr>
              <td colspan='3'><button type="button" class="btn btn-primary" id="btnmodificar">Modificar</button></td><!-- Botón para calcular el total-->
              <td colspan='3'><a href='../promociones.php' class='btn btn-outline-primary'>Cancelar</a></td>
            </tr>
          </table>
        </form> <!-- Cerramos el formulario-->
      </div>
    </div>
  </div>
</div>


  <?php
include("../../include/footer.php");
?>

</html>
<!-- Jquery -->
<script src="../../../public/js/jquery.js"></script>
<!-- SweetAlert js -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../../../public/js/promociones.js"></script>
<!-- Js dates -->
<script src="../../../public/js/datesPromo3.js"></script>

</html>
