<?php
    # Incluimos la clase promocion
    require_once('../../model/promocion.php');
     # Creamos un objeto de la clase promocion
    $promocion = new Promocion();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $promocion->get_promocion();

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTAPOR MEDIO DEL AJAX#
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos de la promocion');
        echo json_encode($error);
    }
?>
