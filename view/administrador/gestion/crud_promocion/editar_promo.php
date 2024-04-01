<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Promociones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario -->
    <link rel="stylesheet" href="../../css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no fake -->
    <link rel="stylesheet" href="../../css/style.css">
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
        <li class="breadcrumb-item"><a href="../../gestion.php">Gestión</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="../promociones.php">Promociones</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modificar</li>
    </ol>
</nav>

<?php
if (isset($_GET['id_promo'])) {
    $codigo = $_GET['id_promo'];

    $queryusuarios = mysqli_query($conexion, "SELECT u.idPromo, u.nom_prod, u.pre_prod, u.cantidad, u.descuento, u.subtotal, u.promocion_idpromo
      ,cv.id_promo, cv.nom_promo, cv.totalpromo FROM det_promo AS u JOIN promocion AS cv ON u.promocion_idpromo = cv.id_promo WHERE u.promocion_idpromo = '$codigo'");
}

if (mysqli_num_rows($queryusuarios) > 0) {
    // Se encontraron resultados, procesamos los datos
    if (isset($_POST['btnmodificar'])) {
        $codigo = $_GET['id_promo'];
        $nuevoNombrePromocion = $_POST['nom_promo'];
        $totalPromocion = 0;

        // Actualizar los datos de los productos (cantidad y descuento)
        if (isset($_POST['idPromo']) && is_array($_POST['idPromo'])) {
            foreach ($_POST['idPromo'] as $key => $idPromo) {
                $cantidad = $_POST['cantidad'][$key];
                $descuento = $_POST['descuento'][$key];

                // Validar que el descuento esté en el rango de 0% a 100%
                $descuento = max(0, min(100, $descuento));

                // Validar que la cantidad no sea nula y sea mayor o igual a 1
                $cantidad = max(1, $cantidad);

                // Obtener el precio del producto desde la base de datos
                $sqlPrecioProducto = "SELECT pre_prod FROM det_promo WHERE idPromo = '$idPromo'";
                $resultPrecio = mysqli_query($conexion, $sqlPrecioProducto);
                if ($resultPrecio && mysqli_num_rows($resultPrecio) > 0) {
                    $rowPrecio = mysqli_fetch_assoc($resultPrecio);
                    $precioProducto = $rowPrecio['pre_prod'];

                    // Calcular el nuevo subtotal
                    $subtotal = $precioProducto * $cantidad * (1 - $descuento / 100);
                    $totalPromocion += $subtotal;

                    // Actualizar los datos de cantidad, descuento y subtotal en la tabla 'det_promo'
                    $sqlDetPromo = "UPDATE det_promo SET cantidad = '$cantidad', descuento = '$descuento', subtotal = '$subtotal' WHERE idPromo = '$idPromo'";
                    if (!mysqli_query($conexion, $sqlDetPromo)) {
                        // Manejar el caso en que la actualización del producto falló
                        echo "Hubo un error al actualizar los datos del producto. Por favor, intenta nuevamente.";
                    }
                }
            }
        }

        // Actualizar el nombre de la promoción y el total en la tabla 'promocion'
        $sqlPromocion = "UPDATE promocion SET nom_promo = '$nuevoNombrePromocion', totalpromo = '$totalPromocion' WHERE id_promo = '$codigo'";
        if (mysqli_query($conexion, $sqlPromocion)) {
            header("Location:../promociones.php");
            exit();
        } else {
            // Manejar el caso en que la actualización de la promoción falló
            echo "Hubo un error al actualizar los datos de la promoción. Por favor, intenta nuevamente.";
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
echo "<th>Nombre</th>";
echo "<th>Precio</th>";
echo "<th>Cantidad</th>";
echo "<th>Descuento (%)</th>";
echo "<th>Subtotal</th>";
echo "</tr>";
$totalPromocion = 0;
while ($mostrar = mysqli_fetch_array($queryusuarios)) {
    $nom_promo = $mostrar['nom_promo'];

    echo "<tr>";
    echo "<td>" . $mostrar['nom_prod'] . "</td>";
    echo "<td>" . $mostrar['pre_prod'] . "</td>";
    echo "<td><input type='number' name='cantidad[]' value='" . $mostrar['cantidad'] . "' min='1' required></td>";
    echo "<td><input type='number' name='descuento[]' value='" . $mostrar['descuento'] . "' min='0' max='100' required></td>";

    // Mostrar el subtotal directamente desde la base de datos
    echo "<td><input type='text' name='subtotal[]' value='" . $mostrar['subtotal'] . "' data-precio='" . $mostrar['pre_prod'] . "' required readonly></td>";
    echo "<input type='hidden' name='idPromo[]' value='" . $mostrar['idPromo'] . "'>";
    echo '</tr>';
    // Agregar los subtotales al total
    $totalPromocion += $mostrar['subtotal'];
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
echo "<tr><td colspan='5'>Modificar Promoción</td></tr>";
echo "<tr>";
echo "<td colspan='2'>Editar nombre de promoción</td>";
echo "<td colspan='3'><input type='text' name='nom_promo' value='" . $nom_promo . "' required></td>";
echo '</tr>';
echo "<tr>";
echo "<td colspan='2'>Total Promoción</td>";
echo "<td colspan='3'><input type='text' name='total_promocion' value='" . $totalPromocion . "' readonly></td>";
echo '</tr>';
echo "<tr>";
echo "<td colspan='5'><a href='../promociones.php' class='btn btn-primary'>Cancelar</a>
<input type='submit' name='btnmodificar' class='btn btn-primary' value='Modificar' onClick='javascript: return confirm(\"¿Deseas modificar este producto?\");'></td>";
echo '</tr>';
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</form>";

include '../../include/img_menu.php';

include '../../include/footer.php';
?>

<script>
    // Función para calcular y actualizar los valores de subtotal y total
    function calcularTotal() {
        var cantidades = document.getElementsByName('cantidad[]');
        var descuentos = document.getElementsByName('descuento[]');
        var subtotales = document.getElementsByName('subtotal[]');
        var totalPromocion = 0;

        for (var i = 0; i < cantidades.length; i++) {
            var precio = parseFloat(subtotales[i].getAttribute('data-precio'));
            var cantidad = parseInt(cantidades[i].value);
            var descuento = parseFloat(descuentos[i].value);

            // Validar que cantidad sea mayor o igual a 0
            if (isNaN(cantidad) || cantidad < 0) {
                cantidades[i].value = cantidad;
            }

            // Validar que descuento esté en el rango de 0 a 100
            if (isNaN(descuento) || descuento < 0 || descuento > 100) {
                descuentos[i].value = descuento;
            }

            // Calcular subtotal si la cantidad es mayor o igual a 0
            if (cantidad >= 0 && descuento >= 0) {
                var subtotal = precio * cantidad * (1 - descuento / 100);
                subtotales[i].value = subtotal.toFixed(0); // Mostrar dos decimales en el subtotal
                totalPromocion += subtotal;
            } else {
                subtotales[i].value = '0'; // Limpiar el subtotal si la cantidad es negativa
            }
        }

        // Actualizar el campo de total para incluir los nuevos valores
        document.getElementsByName('total_promocion')[0].value = totalPromocion.toFixed(0);
    }

    // Asociar la función al evento de cambio en las cantidades y descuentos
    var cantidades = document.getElementsByName('cantidad[]');
    var descuentos = document.getElementsByName('descuento[]');

    for (var i = 0; i < cantidades.length; i++) {
        cantidades[i].addEventListener('input', calcularTotal);
        descuentos[i].addEventListener('input', calcularTotal);
    }

    // Llamar a la función calcularTotal inicialmente
    calcularTotal();
</script>