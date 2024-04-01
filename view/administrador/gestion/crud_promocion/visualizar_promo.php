<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Promociones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="..\..\css\bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="..\..\css\font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="..\..\css\sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="..\..\css\style.css">
  </head>
    <body>

    <?php
    
    // Conectar a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'arca');
    
    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar: " . mysqli_connect_error());
    }
        
        


include '../../include/header.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../../gestion.php">Gestion</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="../promociones.php">Promociones</a></li>
    <li class="breadcrumb-item active" aria-current="page">Visualizar</li>
  </ol>
</nav>
<?php

if(isset($_GET['id_promo'])){
    $codigo = $_GET['id_promo'];
  
      $queryusuarios = mysqli_query($conexion, "SELECT u.idPromo, u.nom_prod, u.pre_prod, u.cantidad,u.descuento,u.subtotal,u.promocion_idpromo
      ,cv.id_promo,cv.nom_promo,cv.totalpromo FROM det_promo AS u JOIN promocion AS cv ON u.promocion_idpromo = cv.id_promo WHERE u.promocion_idpromo = '$codigo'");

  }
    // Verificar si se encontraron resultados
    if (mysqli_num_rows($queryusuarios) > 0) {
        // Se encontraron resultados, procesamos los datos

            echo "<div class='container'>";
            echo "<div class='d-flex justify-content-center'>";
            echo "<div class='row'>";
            echo "<div class='col-md-12 table-responsive'>";
            echo "<table class='table table-bordered border-primary' style='text-align:center'>";
            echo "<tr><th colspan='6'>Detalles de los Productos</th></tr>";
            echo "<tr>";
            echo "<th>Id producto</th>";
            echo "<th>Nombre</th>";
            echo "<th>Precio</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Descuento</th>";
            echo "<th>Subtotal</th>";
            echo "</tr>";

        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
            $id_promo=$mostrar['id_promo'];
            $nom_promo=$mostrar['nom_promo'];
            $totalpromo=$mostrar['totalpromo'];
        
            echo "<tr>";
            echo '<td>' . $mostrar['idPromo'] . '</td>';
            echo '<td>' . $mostrar['nom_prod'] . '</td>';
            echo '<td>' . $mostrar['pre_prod'] . '</td>';
            echo '<td>' . $mostrar['cantidad'] . '</td>';
            echo '<td>' . $mostrar['descuento'] . ' % </td>';
            echo '<td>' . $mostrar['subtotal'] . '</td>';
            echo '</tr>';
        }
            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
 
    } 
?>
            <form method="POST" >
                <div class="container">
                <div class="d-flex justify-content-center">
                <div class="row">
                <div class="col-md-12 table-responsive" >
                    <table class="table table-bordered border-primary" style="text-align:center" >
                    <tbody>
                        <tr>
                            <th colspan="6">Datos de la promocion</th>
                        </tr>
                        <tr>
                            <th colspan="3">Nombre Promocion</th>
                            <th colspan="3">Id promocion</th>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="text" name="nom_promo" value="<?php echo $nom_promo;?>" disabled></td>
                            <td colspan="3"><input type="text" name="id_promo" value="<?php echo $id_promo;?>" disabled></td>
                        </tr>
                        <tr>
                            <th colspan="3">Total de promocion</th>
                            <td colspan="3"><input type="text" name="totalpromo" value="$ <?php echo $totalpromo;?>" disabled></td>
                        </tr>
                        <tr>
                            <td colspan="6"><a href="../promociones.php" class="btn btn-primary">Cerrar</a></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
                </div>
                </div>
            </form>
        </div>
        <?php

        include '../../include/img_menu.php';

        include '../../include/footer.php';
        ?>
    </body>
</html>