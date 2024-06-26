<?php
if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];
    // Aquí podrías sanitizar $idProducto antes de utilizarlo en la consulta

    # Incluimos la clase productos
    require_once('../../model/productos.php');
    # Creamos un objeto de la clase productos
    $productos = new Productos();
    # Llamamos al método para realizar la consulta en la base de datos
    $resultado = $productos->get_productos_x_id($idProducto);

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del producto');
        echo json_encode($error);
    }
} else {
    $error = array('error' => 'Parámetros incorrectos');
    echo json_encode($error);
}
?>
