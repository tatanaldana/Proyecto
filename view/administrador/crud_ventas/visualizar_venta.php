<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ventas</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Importamos los estilos de Bootstrap -->
        <link rel="stylesheet" href="..\administrador\css\bootstrap.css">
        <!-- Font Awesome: para los iconos -->
        <link rel="stylesheet" href="..\administrador\css\font-awesome.min.css">
        <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
        <link rel="stylesheet" href="..\administrador\css\sweetalert.css">
        <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
        <link rel="stylesheet" href="..\css\style.css">
    </head>
<body>

<?php
include_once('../crud/conexion.php');

include '../include/header.php';

?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="..\administrador\index.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="..\administrador\ventas.php">Ventas</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="..\ventas\ver_ventas.php">Preparación</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#">Visualizar</a></li>
    </ol>
</nav>
<?php

if (isset($_GET['doc_cliente'])) {
    $docCliente = $_GET['doc_cliente'];

    // Realizamos la búsqueda en la base de datos
    $queryusuarios = mysqli_query($conexion, "SELECT doc, nombre, apellido, tel, email, direccion FROM usuarios WHERE doc = '$docCliente' ");

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($queryusuarios) > 0) {
        // Se encontraron resultados, procesamos los datos
        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
            $codigo = $mostrar['doc'];
            $nombre = $mostrar['nombre'];
            $apellido = $mostrar['apellido'];
            $telefono = $mostrar['tel'];
            $correo = $mostrar['email'];
            $direccion = $mostrar['direccion'];
        }

        echo "<div class='container'>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12 table-responsive'>";
        echo "<table class='table table-bordered border-primary' style='text-align:center'>";
        echo "<tr><td colspan='3'>Datos del cliente</td></tr>";
        echo '<tr>';
        echo '<td>Documento: ' . $codigo . '</td>';
        echo '<td>Nombre: ' . $nombre . '</td>';
        echo '<td>Apellido: ' . $apellido . '</td>';
        echo "</tr>";
        echo "<tr>";
        echo '<td>Telefono: ' . $telefono . '</td>';
        echo '<td>Correo: ' . $correo . '</td>';
        echo '<td>Direccion: ' . $direccion . '</td>';
        echo "</tr>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } 
} 

echo "<div class='my-5'></div>";

if (isset($_GET['doc'])) {
    $idCarrito = $_GET['doc'];

        // Ahora, realizamos una consulta para obtener los detalles de los productos comprados en esta venta
        $queryDetallesVenta = mysqli_query($conexion, "SELECT producto, precio, cantidad, subtotal FROM com_venta WHERE carrito_idcarrito = '$idCarrito'");

        // Verificar si se encontraron resultados
        if (mysqli_num_rows($queryDetallesVenta) > 0) {
            // Mostramos los detalles de los productos en una tabla
            echo "<div class='container'>";
            echo "<div class='d-flex justify-content-center'>";
            echo "<div class='row'>";
            echo "<div class='col-md-12 table-responsive'>";
            echo "<table class='table table-bordered border-primary' style='text-align:center'>";
            echo "<tr><td colspan='4'>Detalles de los Productos</td></tr>";
            echo "<tr>";
            echo "<th>Producto</th>";
            echo "<th>Precio</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Subtotal</th>";
            echo "</tr>";
            while ($detalle = mysqli_fetch_array($queryDetallesVenta)) {
                if($detalle['cantidad']!=0){ 
                echo "<tr>";
                echo '<td>' . $detalle['producto'] . '</td>';
                echo '<td>' . $detalle['precio'] . '</td>';
                echo '<td>' . $detalle['cantidad'] . '</td>';
                echo '<td>' . $detalle['subtotal'] . '</td>';
                echo '</tr>';
            }
            }
        } 
    $queryTotalVenta = mysqli_query($conexion, "SELECT totalventa FROM com_venta WHERE carrito_idcarrito = '$idCarrito'");
    if ($ventaData = mysqli_fetch_array($queryTotalVenta)) {
        $totalVenta = $ventaData['totalventa'];
        
        // Mostramos el valor de 'totalventa'
        echo "<tr>";
        echo "<td colspan='4'>Total Venta: $totalVenta</td>"; // Mostramos el total de la venta
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='4'><a href='../ventas/ver_ventas.php' class='btn btn-primary'>Cerrar</a></td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
    }

    // Ahora, consultamos la tabla 'carrito' para obtener 'forma_pago'
    $queryFormaPago = mysqli_query($conexion, "SELECT forma_pago FROM carrito WHERE idcarrito = '$idCarrito'");
    if ($carritoData = mysqli_fetch_array($queryFormaPago)) {
        $formaPago = $carritoData['forma_pago'];

        // Mostramos el valor de 'forma_pago'
        echo "<div class='container'>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12'>";
        echo "<div class='form-group'>";
        echo "<label for='forma_pago'>Método de Pago:</label>";
        echo "<input type='text' name='forma_pago' value='$formaPago' readonly>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='my-5'></div>";
    }
    } 
    include '../include/img_menu.php';

    include '../include/footer.php';

?>


    </body>
</html>

