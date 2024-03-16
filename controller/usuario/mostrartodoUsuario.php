<?php
session_start();

# Incluimos la clase usuario
require_once('../../model/usuario.php');

# Creamos un objeto de la clase usuario
$usuario = new Usuario();
$doc = ($_SESSION['doc']);  
# Llamamos al metodo  para realizar la consulta en la base de datos
$resultado = $usuario->get_usuario_por_doc($doc);

header('Content-Type: application/json'); // Establece el tipo de contenido



if ($resultado) {
    $json_response = json_encode($resultado);
    echo $json_response;
} else {
    $error = array('error' => 'No se encontraron datos del usuario');
    echo json_encode($error);
}
?>
