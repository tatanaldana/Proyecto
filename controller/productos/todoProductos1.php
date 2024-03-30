<?php
    # Incluimos la clase mat_prima
    require_once('../../model/productos.php');
     # Creamos un objeto de la clase mat_prima
    $productos = new Productos();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $productos->get_productos();

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTAPOR MEDIO DEL AJAX#
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos de la materia prima');
        echo json_encode($error);
    }
?>