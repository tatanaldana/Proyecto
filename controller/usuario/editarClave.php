<?php
//Se guardan los datos enviados del formulario

require_once('../../model/usuario.php');

$doc = $_POST['modal_doc_2'];
$clave = $_POST['modal_clave'];
$validarClave = $_POST['modal_validar_clave'];

// Verificamos que ningún dato esté vacío
if (empty($clave) || empty($doc)) {
    echo 'error_1'; // Un campo está vacío y es obligatorio
} else {
    try {
        // Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        // Obtenemos la contraseña actual del usuario
        $docClave = $usuario->trae_campo_clave($doc);

        if ($clave === $docClave) {
            // Llamamos al método editar_clave_usuario para realizar el update de los datos en la base de datos
            $usuario->editar_clave_usuario($doc, $validarClave);
            echo 'success'; // Enviamos una respuesta de éxito
        } else {
            echo 'La contraseña actual no es correcta';
        }
    } catch (PDOException $e) {
        echo 'Error en el registro';
    }

}
