<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registro promocion</title>
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
 <form id="agregar_promocion">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-2">
        <div class="card mb-5">
          <div class="card-body d-flex flex-column align-items-center">
            <table class="table">
              
              <tbody>
                <tr>   
                   <div class="mb-3">
                      <label for="" class="form-label">promociones</label>                     
                    </div>             
                    <div class="mb-3">
                      <label for="nom_promo" class="form-label">nombre promocion</label>
                      <input type="text" class="form-control" id="nom_promo" name="nom_promo">
                    </div>
                    <div class="mb-3">
                      <label for="totalpromo" class="form-label">total</label>
                      <input type="number" class="form-control" id="totalpromo" name="totalpromo">
                    </div>
                    <div class="mb-3">
                      <label for="categorias_idcategoria" class="form-label">id categoria</label>
                      <input type="number" class="form-control" id="categorias_idcategoria" name="categorias_idcategoria">
                    </div>
                </tr>  




  
                <!-- Botón para enviar el formulario -->
                 <tr>
                    <td colspan="2" class="center">
                      <div class="btn-group" role="group" aria-label="Botones">
                        <button type="button" class="btn btn-primary my-4 ms-2" id="btnagregarpromo" name="agregarpromo" value="registrar">Agregar</button> 
                          <a href="../promociones.php" class="btn btn-primary my-4 ms-4" id="backButton">Cancelar</a>
                      </div>
                    </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>

<!-- Jquery -->
<script src="../../../public/js/jquery.js"></script>
<!-- SweetAlert js -->
<script src="../../../public/js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../../../public/js/promociones.js"></script>


</body>
</html>
