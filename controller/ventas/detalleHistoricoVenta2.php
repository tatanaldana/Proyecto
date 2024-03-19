<?php
if (isset($_POST['idcarrito_php']) ) {
    $idcarrito = $_POST['idcarrito_php'];

    require_once('../../model/com_venta.php');
    $com_venta = new Com_venta();

    $resultado2 = $com_venta->detalle_historico_venta2($idcarrito);

    if ($resultado2) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado2);
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