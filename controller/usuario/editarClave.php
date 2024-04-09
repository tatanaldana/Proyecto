<?php
require_once('../../model/usuario.php');

// Filtrar y sanitizar los datos de entrada
$doc = filter_input(INPUT_POST, 'modal_doc_2', FILTER_SANITIZE_NUMBER_INT);
$claveActual = filter_input(INPUT_POST, 'modal_clave', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$validarClave = filter_input(INPUT_POST, 'modal_validar_clave', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confirmaClave = filter_input(INPUT_POST, 'modal_confirma_clave', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Verificar si algún dato está vacío
if (empty($claveActual) || empty($doc)) {
    echo 'error_1'; // Un campo está vacío y es obligatorio
} else {
    try {
        // Validar la contraseña
        if ($validarClave !== $confirmaClave) {
            echo 'error_2'; // Las contraseñas no coinciden
            exit;
        } else {
            $caracteres_especiales_permitidos = '!@#$%^&*().';
            if (
                strlen($validarClave) < 4 ||
                !preg_match('/[A-Za-z]/', $validarClave) ||
                !preg_match('/[0-9]/', $validarClave) ||
                !preg_match('/[' . preg_quote($caracteres_especiales_permitidos, '/') . ']/', $validarClave)
            ) {
                echo 'error_3'; // La contraseña no cumple con los requisitos mínimos de seguridad
                exit;
            }
        }

        // Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        // Obtenemos la contraseña actual del usuario
        $claveActualUsuario = $usuario->trae_campo_clave($doc);

        if (password_verify($claveActual, $claveActualUsuario)) {
            // Llamamos al método editar_clave_usuario para realizar el update de los datos en la base de datos
            $usuario->editar_clave_usuario($doc, $validarClave);
            echo "success";
        } else {
            echo 'error_4'; // La contraseña actual no es correcta
        }
    } catch (PDOException $e) {
        echo 'Error en el registro';
    }
}
