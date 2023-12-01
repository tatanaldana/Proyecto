<?php
    # Incluimos la clase categorias
    require_once('../../model/categorias.php');
     # Creamos un objeto de la clase categorias
    $categorias = new Categorias();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $categorias->get_categorias();

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos de la categoria');
        echo json_encode($error);
    }

?>
