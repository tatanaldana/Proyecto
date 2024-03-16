
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Categorias</title>
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
include_once('../../crud/conexion.php');

include '../../include/header.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../../gestion.php">Gestion</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="../categorias_adm.php">Categorias</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
  </ol>
</nav>
<?php

if(isset($_GET['id_cat'])){
    $codigo = $_GET['id_cat'];
  
      $queryusuarios = mysqli_query($conexion, "SELECT u.idProducto, u.nombre_pro, u.detalle, 
      u.precio_pro,u.categorias_idcategoria,cv.nombre_cat
      FROM productos AS u JOIN categorias AS cv ON u.categorias_idcategoria = cv.id_categoria
       WHERE u.categorias_idcategoria = '$codigo'");

  }
    // Verificar si se encontraron resultados
    if (mysqli_num_rows($queryusuarios) > 0) {
        // Se encontraron resultados, procesamos los datos

            echo "<div class='container'>";
            echo "<div class='d-flex justify-content-center'>";
            echo "<div class='row'>";
            echo "<div class='col-md-12 table-responsive'>";
            echo "<table class='table table-bordered border-primary' style='text-align:center'>";
            echo "<tr><td colspan='5'>Detalles de los Productos</td></tr>";
            echo "<tr>";
            echo "<th>Cod. Categoria</th>";
            echo "<th>Id producto</th>";
            echo "<th>Nombre</th>";
            echo "<th>Detalle</th>";
            echo "<th>Precio</th>";
            echo "</tr>";

        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
            $nombre_cat=$mostrar['nombre_cat'];
            echo "<tr>";
            echo '<td>' . $mostrar['categorias_idcategoria'] . '</td>';
            echo '<td>' . $mostrar['idProducto'] . '</td>';
            echo '<td>' . $mostrar['nombre_pro'] . '</td>';
            echo '<td>' . $mostrar['detalle'] . '</td>';
            echo '<td>' . $mostrar['precio_pro'] . '</td>';
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
                            <th colspan="2">Datos de la Categoria</th>
                        </tr>
                        <tr>
                            <td>Nombre Categoria</td>
                            <td><input type="text" name="nombre_cat" value="<?php echo $nombre_cat;?>" disabled></td>
                        </tr>
                        <td colspan="2">
                            <a href="../categorias_adm.php" class="btn btn-primary">Cerrar</a>
                        </td>
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