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

    <div class='container'>
    <div class='d-flex justify-content-center'>
    <div class='row'>
    <div class='col-md-12 table-responsive'>
    <form method='POST' action='../crud_promocion/agregar_promo.php'>
    <table class='table table-bordered border-primary' style='text-align:center'>
    <tr>
    <th scope='col' colspan='3'>Nombre Promocion</th> <!-- Agregamos la columna de selección-->
    <th><input type='text' name='nombre_prom'></th>
    </tr>
    </table>
    <div class='my-5'></div>

    <table id='TablaPromo'class='table table-bordered border-primary' style='text-align:center'>
      <thead>
          <!--<tr>
          <th colspan="8" scope="col" style="text-align:center"> promociones</th>-->   <!-- Encabezado de la tabla -->
          <!--</tr>-->

          <tr>
            <th scope='col'>Seleccionar</th> <!-- Agregamos la columna de selección-->
            <th scope='col'>Producto</th>
            <th scope='col'>Precio</th>
            <th scope='col'>Cantidad</th>
            <th scope='col'>Descuento (%)</th> <!-- Nueva columna para el descuento-->
            <th scope='col'>Subtotal</th> <!-- Agregamos una nueva columna con-->
          </tr>
        </thead>
          <tbody id="filasTabla"></tbody> <!-- Cuerpo de la tabla -->
          
    
              <tr>
                <td colspan='6'>Total Venta: <input type='text' name='totalVenta' id='totalVenta'value='$totalVenta' readonly></td> <!-- Mostramos el total de la venta-->
              </tr>
              <!-- botones del formulario-->
              <tr>
                <td colspan='3'><input type='submit' class='btn btn-outline-primary' name='btnCalcular' value='ingresar promocion'></td><!-- Botón para calcular el total-->
                <td colspan='3'><a href='../promociones.php' class='btn btn-outline-primary' >Cancelar</a></td>
              </tr>
              </table>
              </form> <!-- Cerramos el formulario-->
              </div>
              </div>
              </div>
              </div>

<!-- Jquery -->
<script src="../../../public/js/jquery.js"></script>
<!-- SweetAlert js -->
<script src="../../../public/js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="../../../public/js/promociones.js"></script>
<!-- Js dates -->
<script src="../../../public/js/datesPromo.js"></script>



</body>
</html>
