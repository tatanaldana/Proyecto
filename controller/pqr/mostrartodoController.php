<?php
    # Incluimos la clase usuario
    require_once('../../model/pqr.php');
     # Creamos un objeto de la clase usuario
    $pqr = new PQR();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $pqr->historico_pqr();

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }

?>