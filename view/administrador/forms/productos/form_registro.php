<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registro producto</title>
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

 <form id="agregar_producto">
    <div class="row d-flex justify-content-center">
      <div class="col-xs-2">
        <div class="card mb-5">
          <div class="card-body d-flex flex-column align-items-center">
            <table class="table">
              
              <tbody>
                <tr>
                  
                    <div class="mb-3">
                      <label for="nombre_pro" class="form-label">nombre producto</label>
                      <input type="text" class="form-control" id="nombre_pro" name="nombre_pro" placeholder="pollo">
                    </div>
                    <div class="mb-3">
                      <label for="detalle" class="form-label">detalle</label>
                      <input type="text" class="form-control" id="detalle" name="detalle" placeholder="que lleva">
                    </div>
                    <div class="mb-3">
                      <label for="precio_pro" class="form-label">precio producto</label>
                      <input type="number" class="form-control" id="precio_pro" name="precio_pro" placeholder="Cuanto Hay">
                    </div>
                    <div class="mb-3">
                      <label for="categorias_idcategoria" class="form-label">id categoria</label>
                      <input type="number" class="form-control" id="categorias_idcategoria" name="categorias_idcategoria"placeholder="codigo categoria">
                    </div>
                    <div class="mb-3">
                      <label for="foto" class="form-label">foto</label>
                      <input type="file" class="form-control" id="fot" name="foto" placeholder="imagen">
                    </div>
                    <div class="mb-3">               
                      <label for="cod" class="form-label">codigo</label>
                      <input type="text" class="form-control" id="cod" name="cod" placeholder="referencia producto" >
                    </div>
                    


          <!-- Botón para enviar el formulario -->
          <tr>
        <td colspan="2" class="center">
            <div class="btn-group" role="group" aria-label="Botones">
                <button type="button" class="btn btn-primary my-4 ms-2" id="btn_agregar_prod" name="agregar_prod" value="registrar">Agregar</button> 
                <a href="../productos_adm.php" class="btn btn-primary my-4 ms-4" id="backButton">Cancelar</a>
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
<script src="../../../public/js/productos.js"></script>


</body>
</html>
