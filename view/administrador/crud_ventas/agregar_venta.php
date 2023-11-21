<?php
include '../crud/conexion.php';
include_once '../ventas/datos_ventas.php';

if (isset($_POST['btnCalcular'])) {
    // Obtén la fecha actual
    $fechaVenta = date("Y-m-d H:i:s");

    // Insertar un registro en la tabla `carrito`
    $formaPago = $_POST['forma_pago'];
    $estadoCarrito=1;
    $sqlInsertCarrito = "INSERT INTO carrito (estado,forma_pago) VALUES ('$estadoCarrito','$formaPago')";

    // Ejecutar la consulta para insertar en la tabla `carrito`
    if ($conexion->query($sqlInsertCarrito) === TRUE) {
        // Obtener arrays de productos, precios, cantidades, etc. desde el formulario
        $doc_cliente = $_SESSION['doc_cliente'];
        $idCarrito = $conexion->insert_id;
        $productos = $_POST['producto'];
        $precios = $_POST['precio'];
        $cantidades = $_POST['cantidad'];
        $subtotales = $_POST['subtotal'];
        $totalventa = $_POST['totalVenta'];
        

        // Inicializa un flag para controlar si se completaron todas las inserciones
        $todasInsercionesExitosas = true;

        // Iterar sobre los arrays y realizar la inserción en la tabla `com_venta`
        foreach ($productos as $key => $producto) {
            $precio = $precios[$key];
            $cantidad =isset($cantidades[$key]) ? $cantidades[$key]:0;
            $subtotal = $subtotales[$key];
            $estadoComventa=1;
            // Consulta SQL para insertar cada fila en la tabla `com_venta` ( ya se encuentra la función en el modelo com_venta )
            $sqlInsertComVenta = "INSERT INTO com_venta (doc_cliente, fecha_venta, producto, precio, cantidad, subtotal, totalventa, carrito_idcarrito,estado)
             VALUES ('$doc_cliente', '$fechaVenta', '$producto', '$precio', '$cantidad', '$subtotal', '$totalventa', '$idCarrito','$estadoComventa')";

            if (!$conexion->query($sqlInsertComVenta)) {
                // Si una inserción falla, marca el flag como falso
                $todasInsercionesExitosas = false;
            }
        }

        if ($todasInsercionesExitosas) {
            // Redirige solo si todas las inserciones fueron exitosas
            echo '<script type="text/javascript">
            alert("Venta ingresada exitosamente");
            window.location.href="../ventas/ver_ventas.php";
          </script>';
            exit();
        } else {
            echo "Ha ocurrido un error en alguna inserción.";
        }
    }
}
?>