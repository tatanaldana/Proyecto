<?php
// Verificar si se recibieron todos los datos esperados
if (!isset($_POST['nombre_prom'], $_POST['totalVenta'], $_POST['producto'], $_POST['precio'], $_POST['cantidad'], $_POST['descuento'], $_POST['subtotal'])) {
    echo json_encode(['error' => 'Por favor completar los datos para ingresar el formulario']);
    exit;
}

// Si se recibieron todos los datos esperados, proceder con el procesamiento
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

// Llamar al método insert_promocion para insertar los datos de la promoción en la base de datos
$idpromo = $promocion->insert_promocion($nom_promo, $totalpromo);

// Verificar si la inserción de la promoción fue exitosa
if ($idpromo) {
    $todasInsercionesExitosas = true;
    $productosInsertados = array();

    // Iterar sobre los productos para insertarlos en la tabla det_promo
    foreach ($productos as $key => $producto) {
        $precio = $precios[$key];
        $cantidad = isset($cantidades[$key]) ? $cantidades[$key] : 0;
        $descuento = isset($descuentos[$key]) ? $descuentos[$key] : 0;
        $subtotal = $subtotales[$key];

        // Verificar que la cantidad sea mayor que cero y que el producto no haya sido insertado previamente
        if ($cantidad > 0 && !in_array($producto, $productosInsertados)) {
            // Llamar al método insert_promo para insertar el producto en la tabla det_promo
            $resultado2 = $det_promo->insert_promo($producto, $precio, $cantidad, $descuento, $subtotal,$idpromo);
            if (!$resultado2) {
                $todasInsercionesExitosas = false;
            } else {
                $productosInsertados[] = $producto;
            }
        }
    }

    // Enviar una respuesta JSON
    if ($todasInsercionesExitosas) {
        header('Content-Type: application/json');
        echo json_encode(['success' => 'La promoción y sus productos fueron ingresados exitosamente']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Ocurrió un error al ingresar uno o más productos de la promoción']);
    }
} else {
    header('Content-Type: application/json');
    // Si no se encontraron datos de promoción, enviar un mensaje de error
    echo json_encode(['error' => 'No se encontraron datos de promoción']);
}
?>