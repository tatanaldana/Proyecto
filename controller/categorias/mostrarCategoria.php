<?php

if (isset($_POST['buscar_php'])) {
    $buscar = $_POST['buscar_php'];
    // Sanitizar $buscar para prevenir inyección de SQL (ejemplo):
    $buscar = htmlspecialchars($buscar);

    # Incluimos la clase usuario
    require_once('../../model/categorias.php');
    # Creamos un objeto de la clase categorias
    $categorias = new categorias();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $categorias->ver_categoria($buscar);
    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos de la categoria');
        echo json_encode($error);
    }
} else {
    $error = array('error' => 'Parámetros incorrectos');
    echo json_encode($error);
}
?>
