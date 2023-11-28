<?php
if (isset($_POST['doc_php'])) {
    $doc = $_POST['doc_php'];
    // Aquí podrías sanitizar $doc antes de utilizarlo en la consulta

     # Incluimos la clase usuario
    require_once('../../model/usuario.php');
     # Creamos un objeto de la clase usuario
    $usuario = new Usuario();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $usuario->get_usuario_por_doc($doc);

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }
} else {
    $error = array('error' => 'Parámetros incorrectos');
    echo json_encode($error);
}
?>