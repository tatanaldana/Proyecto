<?php
if (isset($_POST['cod_materia_pri'])) {
    $cod_materia_pri = $_POST['cod_materia_pri'];
    // Aquí podrías sanitizar $id_categoria antes de utilizarlo en la consulta

     # Incluimos la clase categorias
    require_once('../../model/mat_prima.php');
     # Creamos un objeto de la clase categoria
    $mat_prima = new Mat_prima();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $mat_prima->get_mat_prima_x_cod($cod_materia_pri);

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
