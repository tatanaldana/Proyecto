<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Registro-Administrador</title>
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

<form id="agregarCategoria">
   
    <div class="row d-flex justify-content-center">
        <div class="col-xs-3">
            <div class="card mb-5">
                <div class="card-body d-flex flex-column align-items-center">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2" class="center">Nueva Categoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><label for="categoria"></label></td>
                                <td><input type="text" class="form" id="categoria" name="categoria" placeholder="Ingresa la categoría"></td>
                            </tr>
                            <form id="agregarCategoria">
    <tr>
        <td colspan="2" class="center">
            <div class="btn-group" role="group" aria-label="Botones">
                <button type="submit" class="btn btn-primary my-4 ms-2" id="btnagregarCategoria" name="btnregistrar" value="registrar">Agregar</button> 
                <a href="../../../administrador/gestion/categorias_adm.php" class="btn btn-primary my-4 ms-4" id="backButton">Cancelar</a>
            </div>
        </td>
    </tr>
</form>

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
<script src="../../../public/js/categorias.js"></script>
</body>
</html>
