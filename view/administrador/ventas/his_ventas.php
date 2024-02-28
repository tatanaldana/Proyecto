<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../../public/css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../../public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../../public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../../public/css/style.css">
  </head>
  <body>
  <?php
  include '../include/header.php';

    ?>
    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="../ventas.php">Ventas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Historico</li>
  </ol>
</nav>
<div class="container">
      <div class="d-flex justify-content-center">
        <form method="POST">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td>
                  <label for="fecha_inicial">Fecha Inicial:</label>
                </td>
                <td>
                  <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial">
                </td>
                <td>
                  <label for="fecha_final">Fecha Final:</label>
                </td>
                <td>
                  <input type="date" class="form-control" id="fecha_final" name="fecha_final">
                </td>
                <td>
                  <button type="submit" class="btn btn-primary" name="btnbuscar">Buscar</button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>

      <div class="d-flex justify-content-center">
        <table class="table table-bordered border-primary" style="text-align:center">
          <thead>
            <tr>
              <th scope="col">Seleccionar</th>
              <th scope="col">Cedula</th>
              <th scope="col">Fecha</th>
              <th scope="col">ID venta</th>
              <th scope="col">Total</th>
              <th scope="col">Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../crud/conexion.php';

            include '../crud_ventas/boton2.php';

            if (isset($_POST['btnbuscar'])) {
                $fecha_inicial = $_POST['fecha_inicial'];
                $fecha_final = $_POST['fecha_final'];

                $queryusuarios = mysqli_query($conexion, "SELECT c.doc_cliente, c.fechaventa, c.carrito_idcarrito, c.totalventa, 
                CASE WHEN c.estado = 2 THEN 'Completada' ELSE 'Otro Estado' END AS estado
                FROM com_venta AS c
                JOIN carrito AS cv ON c.carrito_idcarrito = cv.id
                WHERE c.estado = 2 AND c.fecha_venta BETWEEN '$fecha_inicial' AND '$fecha_final'
                GROUP BY cv.id");
            } else {
                $queryusuarios = mysqli_query($conexion, "SELECT c.doc_cliente, c.fechaventa, c.carrito_idcarrito, c.totalventa, 
                CASE WHEN c.estado = 2 THEN 'Completada' ELSE 'Otro Estado' END AS estado
                FROM com_venta AS c
                JOIN carrito AS cv ON c.carrito_idcarrito = cv.id
                WHERE c.estado = 2
                GROUP BY cv.id");
            }

            while ($mostrar = mysqli_fetch_array($queryusuarios)) {
                echo "<tr>";
                echo "<td><div class='form-check' >
                        <input  class='form-check-input' type='checkbox' value='' data-doc-usuario='" . $mostrar['carrito_idcarrito'] . "'
                        data-doc-usuario2='" . $mostrar['doc_cliente'] . "' style='text-align:center' onchange='toggleButtons(this)'/>
                        </div></td>";
                echo "<td>"; echo $mostrar['doc_cliente']; echo "</td>";
                echo "<td>"; echo $mostrar['fechaventa']; echo "</td>";
                echo "<td>"; echo $mostrar['carrito_idcarrito']; echo "</td>";
                echo "<td>"; echo $mostrar['totalventa']; echo "</td>";
                echo "<td>"; echo $mostrar['estado']; echo "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-around">
            <div class="row">
            <table class="table-responsive">
                <tr>
                    <td><a href="../crud_ventas/visualizar_venta2.php?doc=<?php echo $mostrar['carrito_idcarrito'];?>&doc_cliente=<?php echo $mostrar['doc_cliente']; ?>"
                    class="btn btn-primary" id="viewButton">Visualizar</a></td>
                </tr> 
            </table>
            </div>
        </div>
    </div>
<?php

    include '../include/img_menu.php';

    include '../include/footer.php';
  ?>

    </body>
</html>
