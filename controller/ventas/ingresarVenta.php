<?php
if (isset($_POST['documento_usuario'])) {
    $doc_cliente = filter_var($_POST['documento_usuario'], FILTER_VALIDATE_INT);
    $fechaventa = date("Y-m-d H:i:s");
    $totalventa = $_POST['totalVenta'];
    $detallesventa = json_decode($_POST['detalles_venta'], true);
    $formaPago = $_POST['forma_pago'];
    $estadoCarrito = 1;

    require_once('../../model/carrito.php');
    require_once('../../model/com_venta.php');

    $ventas = new Carrito();
    $comVenta = new Com_venta();

    $carrito_idcarrito = $ventas->insert_ventas_carrito($formaPago, $estadoCarrito);


    if ($carrito_idcarrito !== false) {
        $todasInsercionesExitosas = true;
        foreach ($detallesventa as $detalle) {
            $producto = $detalle['producto'];
            $precio = $detalle['precio'];
            $cantidad = $detalle['cantidad'];
            $subtotal = $detalle['subtotal'];


            $resultadoInsercion = $comVenta->registroVenta($doc_cliente, $fechaventa, $producto, $precio, $cantidad, $subtotal, $totalventa, $carrito_idcarrito, 1);

            if (!$resultadoInsercion) {
                $todasInsercionesExitosas = false;
            }
        }

        if ($todasInsercionesExitosas) {
            $response = array ("success" => true, "message" => "Venta ingresada exitosamente");
        } else {
            $response = array("success" => false, "message" => "Ha ocurrido un error en alguna inserción.");
        }
    } else {
        $response = array("success" => false, "message" => "Error al insertar en la tabla carrito.");
    }
} else {
    $response = array("success" => false, "message" => "No se ha encontrado información del cliente.");
}

echo json_encode($response);
exit();
?>