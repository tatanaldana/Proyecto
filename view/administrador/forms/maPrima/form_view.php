<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Visualizar Categoría</title>
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


<body>
  <!-- Espacio en blanco -->
  <div class="my-5"></div>

  <form id="visualizar_mat_prima">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-2">
        <div class="card mb-5">
          <div class="card-body d-flex flex-column align-items-center">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Visualizar Materia Prima</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                  <div class="mb-3">
                      <label for="cod_materia_pri" class="form-label">codigo</label>
                      <input type="number" class="form-control" id="cod_materia_pri" name="cod_materia_pri" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="referencia" class="form-label">referencia</label>
                      <input type="text" class="form-control" id="referencia" name="referencia" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="descripcion" class="form-label">descripcion</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="existencia" class="form-label">existencia</label>
                      <input type="number" class="form-control" id="existencia" name="existencia" readonly>
                    </div>
                    <div class="mb-3">
                    <div class="mb-3">
                      <label for="entrada" class="form-label">entrada</label>
                      <input type="number" class="form-control" id="entrada" name="entrada" readonly>
                    </div>
                    <div class="mb-3">
                    <div class="mb-3">
                      <label for="salida" class="form-label">salida</label>
                      <input type="number" class="form-control" id="salida" name="salida" readonly>
                    </div>
                    <div class="mb-3">               
                      <label for="stock" class="form-label">stock</label>
                      <input type="number" class="form-control" id="stock" name="stock" readonly>
                    </div>
                    <div class="mb-3">
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="text-center">
                    <a href="../ma_prima.php" class="btn btn-primary">Volver</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>

</body>
</html>
<!-- Jquery -->
<script src="../../../public/js/jquery.js"></script>
<!-- SweetAlert js -->
<script src="../../../public/js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../../../public/js/maPrima.js"></script>
</body>
</html>
