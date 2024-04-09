<?php
// Verificar si se recibieron todos los datos esperados
if (!isset($_POST['nombre_prom'], $_POST['totalVenta'], $_POST['producto'], $_POST['precio'], $_POST['cantidad'], $_POST['descuento'], $_POST['subtotal'])) {
    echo json_encode(['error' => 'Por favor completar los datos para ingresar el formulario']);
    exit;
}

// Si se recibieron todos los datos esperados, proceder con el procesamiento
$id_promo = $_POST['id_promo'];
$nom_promo = $_POST['nombre_prom'];
$totalpromo = $_POST['totalVenta'];
$productos = $_POST['producto'];
$precios = $_POST['precio'];
$cantidades = $_POST['cantidad'];
$descuentos = $_POST['descuento'];
$subtotales = $_POST['subtotal'];

// Incluir las clases necesarias
require_once '../../model/det_promo.php';
require_once '../../model/promocion.php';

// Crear objetos de las clases necesarias
$promocion = new Promocion();
$det_promo = new Det_promo();

// Actualizar la promoción
$resultado = $promocion->update_promocion($nom_promo, $totalpromo, $id_promo);

// Verificar si la actualización de la promoción fue exitosa
if ($resultado) {
    $todasActualizacionesExitosas = true;
    $productosActualizados = array();

    // Iterar sobre los productos para actualizar o insertar en la tabla det_promo
    for ($i = 0; $i < count($productos); $i++) {
        $producto = $productos[$i];
        $precio = $precios[$i];
        $cantidad = isset($cantidades[$i]) ? $cantidades[$i] : 0;
        $descuento = isset($descuentos[$i]) ? $descuentos[$i] : 0;
        $subtotal = $subtotales[$i];

        // Verificar si la cantidad es mayor que cero y si el producto no ha sido actualizado previamente
        if ($cantidad > 0 && !in_array($producto, $productosActualizados)) {
            // Actualizar o insertar el detalle de la promoción en la tabla det_promo
            $resultado_detalle = $det_promo->update_or_insert_detalle($id_promo, $producto, $precio, $cantidad, $descuento, $subtotal);
            
            if (!$resultado_detalle) {
                $todasActualizacionesExitosas = false;
            } else {
                $productosActualizados[] = $producto;
            }
        }
    }

    // Eliminar los productos que no estén presentes en la solicitud
    $resultado_eliminar = $det_promo->eliminar_productos_faltantes($id_promo, $productosActualizados);
    if (!$resultado_eliminar) {
        $todasActualizacionesExitosas = false;
    }

    // Enviar una respuesta JSON
    if ($todasActualizacionesExitosas) {
        header('Content-Type: application/json');
        echo json_encode(['success' => 'La promoción y sus productos fueron actualizados exitosamente']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Ocurrió un error al actualizar uno o más productos de la promoción']);
    }
} else {
    header('Content-Type: application/json');
    // Si no se encontraron datos de promoción, enviar un mensaje de error
    echo json_encode(['error' => 'No se encontraron datos de promoción']);
}
?>