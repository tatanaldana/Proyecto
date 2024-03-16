<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../../../public/css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../../../public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../../../public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../../../public/css/style.css">
  </head>
  <body>
  <?php
  include '../../include/header.php';
  ?>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="../../ventas.php">Ventas</a></li>
    </ol>
  </nav>
  <div class="my-5"></div> 
  <div class="container">
          <div class="d-flex justify-content-center">
          <div class="row">
          <div class="col-md-12 table-responsive">
              <table class="table table-bordered border-primary" style="text-align:center">
                <tbody id="TablaClientes">
                </tbody>
              </table>
          </div>
          </div>
          </div>
          </div>
    <div class="my-5"></div> 
    <div class='container'>
    <div class='d-flex justify-content-center'>
    <div class='row'>
    <div class='col-md-12 table-responsive'>
      <form id="formventa">
        <div class='form-group'>
          <label for='forma_pago'>Método de Pago:</label>
          <select name='forma_pago' id='forma_pago'>
          <option value='efectivo'>Efectivo</option>
          <option value='tarjeta'>Tarjeta de Crédito</option>
          <option value='transferencia'>Transferencia Bancaria</option>
        </select>
    <div class='my-5'></div>
    <table class='table table-bordered border-primary' style='text-align:center'>
      <tbody id="TablaProductos">
      </tbody>
      <tr><td colspan="3"><input type="submit" class="btn btn-outline-primary" id="btnCalcular" value="Ingresar venta"></td>
      <td colspan="2"><a href="../../ventas.php" class="btn btn-outline-primary">Cancelar</a></td>
      </tr>
    </table>
    </form>
  </div>
  </div>
  </div>
  </div>
  </div>
  <?php
  include '../../include/footer.php';
  ?>
  <body>
  <!-- Jquery -->
  <script src="../../../public/js/jquery.js"></script>

  <!-- Js personalizado -->
  <script src= "../../../public/js/ventas.js"></script>

  <script src= "../../../public/js/datesClienteVenta.js"></script>
  <script src= "../../../public/js/datesProductos.js"></script>

</html>