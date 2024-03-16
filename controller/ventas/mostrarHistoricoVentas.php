<?php
    # Incluimos la clase usuario
    require_once('../../model/com_venta.php');
     # Creamos un objeto de la clase usuario
    $com_venta = new Com_venta();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $com_venta->historico_venta();

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }

?>