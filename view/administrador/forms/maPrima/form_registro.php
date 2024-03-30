<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registro Materia Prima</title>
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

<!-- Espacio en blanco -->
<div class="my-5"></div>



 <form id="agregar_maprima">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-2">
        <div class="card mb-5">
          <div class="card-body d-flex flex-column align-items-center">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Agregar Materia Prima</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  
                    <div class="mb-3">
                      <label for="referencia" class="form-label">referencia</label>
                      <input type="text" class="form-control" id="referencia" name="referencia" placeholder="P001">
                    </div>
                    <div class="mb-3">
                      <label for="descripcion" class="form-label">descripcion</label>
                      <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                      <label for="existencia" class="form-label">existencia</label>
                      <input type="number" class="form-control" id="existencia" name="existencia" placeholder="Cuanto Hay">
                    </div>
                    <div class="mb-3">
                    <div class="mb-3">
                      <label for="entrada" class="form-label">entrada</label>
                      <input type="number" class="form-control" id="entrada" name="entrada"placeholder="cuanto Llego">
                    </div>
                    <div class="mb-3">
                    <div class="mb-3">
                      <label for="salida" class="form-label">salida</label>
                      <input type="number" class="form-control" id="salida" name="salida" placeholder="cuanto se utilizo">
                    </div>
                    <div class="mb-3">               
                      <label for="stock" class="form-label">stock</label>
                      <input type="number" class="form-control" id="stock" name="stock" placeholder="cuanto quedo en total" >
                    </div>
                    </tbody>
                    <tr>
                      <td colspan="2" class="center">
                          <div class="btn-group" role="group" aria-label="Botones">
                              <button type="button" class="btn btn-primary my-4 ms-2" id="btnagregarmaprima"  value="registrar" >Agregar</button> 
                              <a href="../../gestion/ma_prima.php" class="btn btn-primary my-4 ms-4" id="backButton">Cancelar</a>
                          </div>
                      </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
          <!-- Botón para enviar el formulario -->


    



<!-- Jquery -->
<script src="../../../public/js/jquery.js"></script>
<!-- SweetAlert js -->
<script src="../../../public/js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../../../public/js/maPrima.js"></script>


</body>
</html>
