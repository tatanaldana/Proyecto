<?php
//Se guardan los datos enviados del formulario

require_once('../../model/usuario.php');


$doc = $_POST['modal_doc_2'];
$claveActual = $_POST['modal_clave'];
$validarClave = $_POST['modal_validar_clave'];
<<<<<<< Updated upstream
$confirmaClave = $_POST['modal_confirma_clave'];


=======
$confirmaClave = $_POST['modal_validar_clave'];
>>>>>>> Stashed changes

// Verificamos que ningún dato esté vacío
if (empty($claveActual) || empty($doc)) {
    echo 'error_1'; // Un campo está vacío y es obligatorio
} else {
    try {
        if ($validarClave !== $confirmaClave) {
            echo 'La clave nueva y de confirmacion, no coinciden';
            exit;
        }
        // Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        // Obtenemos la contraseña actual del usuario
        $claveActualUsuario = $usuario->trae_campo_clave($doc);

<<<<<<< Updated upstream
        if (password_verify($claveActual, $claveActualUsuario)) {
=======
        if (password_verify($clave, $docClave)) {
>>>>>>> Stashed changes
            // Llamamos al método editar_clave_usuario para realizar el update de los datos en la base de datos
            $usuario->editar_clave_usuario($doc, $claveActual);
            echo 'success'; // Enviamos una respuesta de éxito

        } else {
            echo 'La contraseña actual no es correcta';
        }
    } catch (PDOException $e) {
        echo 'Error en el registro';
    }
}
