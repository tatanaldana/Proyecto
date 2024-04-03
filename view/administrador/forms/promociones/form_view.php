<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Visualizar promociones</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="../../../public/css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="../../../public/css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario -->
  <link rel="stylesheet" href="../../../public/css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="../../../public/css/styles.css">
  <!-- Personalizado   -->
</head>
<?php
include("../../include/header.php");
?>



<!-- miga de pan -->
<nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
              <li class="breadcrumb-item"><a href="../../gestion.php">Gestion</a></li>
              <li class="breadcrumb-item"><a href="../ma_prima.php">Promociones</a></li>
              <li class="breadcrumb-item active" aria-current="page">Agregar Promociones </li>
            </ol>
          </nav>
<body>
  <!-- Espacio en blanco -->
  <div class="my-5"></div>

  <form id="visualizar_mat_prima">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-2">
        <div class="card mb-5">
          <div class="card-body d-flex flex-column align-items-center">
            <table class="table">
              
              <tbody>
                <tr>   
                   <div class="mb-3">
                      <label for="id_promo" class="form-label">promociones</label>                     
                    </div>             
                    <div class="mb-3">
                      <label for="id_promo" class="form-label">id promocion</label>
                      <input type="number" class="form-control" id="id_promo" name="id_promo" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="nom_promo" class="form-label">nombre promocion</label>
                      <input type="text" class="form-control" id="nom_promo" name="nom_promo" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="totalpromo" class="form-label">total</label>
                      <input type="number" class="form-control" id="totalpromo" name="totalpromo" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="categorias_idcategoria" class="form-label">id categoria</label>
                      <input type="number" class="form-control" id="categorias_idcategoria" name="categorias_idcategoria" readonly>
                    </div>
                </tr>  
                  <td colspan="2" class="text-center">
                    <a href="../promociones.php" class="btn btn-primary">Volver</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>

  <?php

include("../../include/footer.php");
?>
<!-- Jquery -->
<script src="../../../public/js/jquery.js"></script>
<!-- SweetAlert js -->
<script src="../../../public/js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../../../public/js/promociones.js"></script>
</body>
</html>
