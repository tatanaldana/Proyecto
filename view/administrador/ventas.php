<?php
require_once '../../model/usuario.php';

usuario::verificarSesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../public/css/styles.css">
  </head>
  <body>
  <?php
  include 'include/header.php';

  include 'include/img_ventas.php';
  ?>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
  </ol>
</nav>
<div class="my-5"></div>
<form id="formbuscar">
  <div class="container">
    <div class="d-flex justify-content-center">
      <div class="row ">
        <div class="col-md-12 table-responsive" >
        <table class="table table-bordered border-primary" style="text-align:center" >
            <tbody>
                <tr>
                    <th colspan="2">Nuevo Venta</th>
                    <td>
                        <input type="search" class="form-control rounded" placeholder="Ingrese el documento" aria-label="Buscar" aria-describedby="search-addon" name="txtcontinuar" id="buscar" required/>
                    <td colspan="2">
                        <button type="button" class="btn btn-outline-primary" name="btncontinuar" value="button" id="btn_venta">Continuar</button>
                    </td>
                </tr>
            </tbody>  
        </table>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="my-5"></div>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
        <table class="table-responsive">
            <tr>
                <td><a href="forms/ventas/form_preparacion.php" class="btn btn-primary" >Verificar venta</a></td>
                <td><a href="forms/ventas/form_historico.php"  class="btn btn-primary" >Historico</a></td>
            </tr> 
        </table>
        </div>
    </div>
</div>
<?php
    
    include 'include/img_menu.php';

    include 'include/footer.php';
  ?> 

  </body>
      <!-- Jquery -->
  <script src="../public/js/jquery.js"></script>
  <!-- Js personalizado -->
  <script src= "../public/js/ventas.js"></script>

</html>