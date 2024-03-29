<?php

if (isset($_POST['buscar_php'])) {
    $buscar = $_POST['buscar_php'];
    // Sanitizar $buscar para prevenir inyección de SQL (ejemplo):
    $buscar = htmlspecialchars($buscar);

    # Incluimos la clase usuario
    require_once('../../model/mat_prima.php');
    # Creamos un objeto de la clase materia prima
    $mat_prima = new Mat_prima();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $mat_prima->ver_mat_pri($buscar);
    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos de la materia prima');
        echo json_encode($error);
    }
} else {
    $error = array('error' => 'Parámetros incorrectos');
    echo json_encode($error);
}
?>
