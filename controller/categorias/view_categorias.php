<?php
if (isset($_POST['id_categoria'])) {
    $id_categoria = $_POST['id_categoria'];
    // Aquí podrías sanitizar $id_categoria antes de utilizarlo en la consulta

     # Incluimos la clase categorias
    require_once('../../model/categorias.php');
     # Creamos un objeto de la clase categoria
    $categorias = new Categorias();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $categorias->get_categorias_x_id($id_categoria);

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

