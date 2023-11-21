<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Categorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../../css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no fake -->
    <link rel="stylesheet" href="../../css/style.css">
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
    <li class="breadcrumb-item active" aria-current="page">Modificar</li>
  </ol>
</nav>
    <?php
    if(isset($_GET['id_cat'])){
        $codigo = $_GET['id_cat'];

        $queryusuarios = mysqli_query($conexion, "SELECT u.idProducto, u.nombre_pro, u.detalle, u.precio_pro,u.categorias_idcategoria,cv.nombre_cat
          FROM productos AS u JOIN categorias AS cv ON u.categorias_idcategoria = cv.id_categoria WHERE u.categorias_idcategoria = '$codigo'");
    }

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($queryusuarios) > 0) {
        // Se encontraron resultados, procesamos los datos
        if (isset($_POST['btnmodificar'])) {
            $codigo = $_GET['id_cat'];
            $nuevoNombreCategoria = $_POST['nombre_cat'];

            // Actualizar el nombre de la categoría en la tabla 'categorias'
            $sqlCategoria = "UPDATE categorias SET nombre_cat = '$nuevoNombreCategoria' WHERE id_categoria = '$codigo'";
            

            // Actualizar los datos de los productos
            if (isset($_POST['idProducto']) && is_array($_POST['idProducto'])) {
                foreach ($_POST['idProducto'] as $key => $idProducto) {
                    $nombre_pro = $_POST['nombre_pro'][$key];
                    $detalle = $_POST['detalle'][$key];
                    $precio_pro = $_POST['precio_pro'][$key];

                    // Actualizar los datos de los productos en la tabla 'productos'
                    $sqlProducto = "UPDATE productos SET nombre_pro = '$nombre_pro', detalle = '$detalle', precio_pro = '$precio_pro' WHERE idProducto = '$idProducto'";
                    
                    if (mysqli_query($conexion, $sqlCategoria) && mysqli_query($conexion, $sqlProducto)) {
                        header("Location:../categorias_adm.php");
                        exit();
                    } else {
                        // Manejar el caso en que una o ambas consultas fallaron
                        echo "Hubo un error al modificar los datos. Por favor, intenta nuevamente.";
                    }
                }
            }
        }

        echo "<form method='POST'>";
        echo "<div class='container'>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12 table-responsive'>";
        echo "<table class='table table-bordered border-primary' style='text-align:center'>";
        echo "<tr><td colspan='5'>Detalles de los Productos</td></tr>";
        echo "<tr>";
        echo "<th>Id producto</th>";
        echo "<th>Nombre</th>";
        echo "<th>Detalle</th>";
        echo "<th>Precio</th>";
        echo "</tr>";

        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
            $nombre_cat=$mostrar['nombre_cat'];
            echo "<tr>";
            echo "<td><input type='text' name='idProducto[]' value='". $mostrar['idProducto'] ."' required></td>";
            echo "<td><input type='text' name='nombre_pro[]' value='". $mostrar['nombre_pro'] ."' required></td>";
            echo "<td><input type='text' name='detalle[]' value='". $mostrar['detalle'] ."' required></td>";
            echo "<td><input type='text' name='precio_pro[]' value='". $mostrar['precio_pro'] ."' required></td>";
            echo '</tr>';
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='my-5'></div>";
        echo "<div class='container'>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12 table-responsive'>";
        echo "<table class='table table-bordered border-primary' style='text-align:center'>";
        echo "<tr><td colspan='5'>Modificar categoria</td></tr>";
        echo "<tr>";
        echo "<td>Editar nombre de categoria</td>";
        echo "<td><input type='text' name='nombre_cat' value='". $nombre_cat ."' required></td>";
        echo '</tr>';
        echo "<tr>";
        echo "<td colspan='2'><a href='../categorias_adm.php' class='btn btn-primary'>Cancelar</a>
        <input type='submit' name='btnmodificar' class='btn btn-primary' value='Modificar' onClick='javascript: return confirm(\"¿Deseas modificar este producto?\");'></td>";
        echo '</tr>';
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</form>";
    }

    include '../../include/img_menu.php';

    include '../../include/footer.php';
    ?>   
  </body>
</html>