<?php

/*$response = array(); // Inicializamos el array de respuesta*/

if (isset($_POST['doc_php']) && isset($_POST['idcarrito_php'])) {
    $doc = $_POST['doc_php'];
    $idcarrito = $_POST['idcarrito_php'];

    require_once('../../model/com_venta.php');
    $com_venta = new Com_venta();

    $resultado = $com_venta->detalle_historico_venta($doc, $idcarrito);

    if ($resultado) {
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }
} else {
    $error = array('error' => 'Parámetros incorrectos');
    echo json_encode($error);
}
?>