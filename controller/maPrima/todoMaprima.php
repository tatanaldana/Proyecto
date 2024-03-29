<?php
    # Incluimos la clase mat_prima
    require_once('../../model/mat_prima.php');
     # Creamos un objeto de la clase mat_prima
    $mat_prima = new Mat_prima();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $mat_prima->get_mat_prima();

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTAPOR MEDIO DEL AJAX#
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos de la materia prima');
        echo json_encode($error);
    }
?>
