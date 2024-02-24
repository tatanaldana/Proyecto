<?php
require_once('../../model/productos.php');

header('Content-Type: application/json');


if (isset($_GET['idCategoria'])) {
    $idCategoria = $_GET['idCategoria'];
    $productos = new Productos();
    $resultado = $productos->get_productos_por_categoria($idCategoria);

    if ($resultado) {
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
  
        $error = ['error' => 'No se encontraron datos de la categoría'];
        echo json_encode($error);
    }
} else {
    $error = ['error' => 'ID de categoría no proporcionado'];
    echo json_encode($error);
}
?>

