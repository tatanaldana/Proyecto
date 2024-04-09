<?php
session_start();

require_once '../conexion.php';

$consulta = "SELECT * FROM carrito";
$resultado = mysqli_query($conexion, $consulta);

$errores = [];

$forma_pago = '';
$fechaVenta = '';
$idCarrito = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['metodo_pago'])) {
        $forma_pago = $_POST['metodo_pago'];
    }

    $fechaVenta = date("Y-m-d H:i:s");

    $forma_pago =  mysqli_real_escape_string($conexion, $forma_pago);
    $estado = 1;

    // Insertar en la tabla carrito
    $sqlInsertCarrito = "INSERT INTO carrito (forma_pago, estado) VALUES (?, ?)";
    $stmtInsertCarrito = $conexion->prepare($sqlInsertCarrito);
    $stmtInsertCarrito->bind_param("si", $forma_pago, $estado);
    $stmtInsertCarrito->execute();

    if ($stmtInsertCarrito->affected_rows > 0) {
        $idCarrito = $stmtInsertCarrito->insert_id;

        if (isset($_SESSION["items_carrito"])) {
            $totcantidad = 0;
            $totprecio = 0;

            // Iterar sobre los arrays y realizar la inserción en la tabla com_venta
            foreach ($_SESSION["items_carrito"] as $item) {
                $item_price = $item["txtcantidad"] * $item["larause_pre"];

                // Obtener arrays de productos, precios, cantidades, etc. desde el formulario
                $productos = (is_null($item["larause_nom"])) ? '' : $item["larause_nom"];
                $precios = (is_null($item["larause_pre"])) ? '' : $item["larause_pre"];
                $cantidad = (is_null($item["txtcantidad"])) ? '' : $item["txtcantidad"];
                $subtotal = (is_null($item["larause_pre"])) ? '' : $item["larause_pre"];

                // Insertar en la tabla com_venta
                $sqlInsertComVenta = "INSERT INTO com_venta (producto, precio, cantidad, subtotal, totalventa, doc_cliente, fechaventa, carrito_idcarrito, estado)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmtComVenta = $conexion->prepare($sqlInsertComVenta);
                $doc_cliente = $_SESSION['doc'];
                $fechaVenta = date("Y-m-d H:i:s");
                $stmtComVenta->bind_param("siiiiisii", $productos, $precios, $cantidad, $subtotal, $totprecio, $doc_cliente, $fechaVenta, $idCarrito, $estado);
                $stmtComVenta->execute();


                if ($stmtComVenta->affected_rows === 0) {
                    // Manejar error en la inserción en com_venta
                    echo "Error en la inserción en com_venta";
                }

                $totcantidad += $item["txtcantidad"];
                $totprecio += ($item["larause_pre"] * $item["txtcantidad"]);
            }

            // Redirigir después de todas las inserciones exitosas
            echo '<script type="text/javascript">
                    alert("Gracias Por tu compra!");
                    window.location.href="../index.php";
                    </script>';
            exit();
        }
    } else {
        echo "Error en la inserción en carrito";
    }
}
?>
