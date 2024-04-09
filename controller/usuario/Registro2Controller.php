<?php

require_once('../../model/usuario.php');
usuario::verificarSesion();

    $nombre = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $tel = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
    $genero = $_POST['genero']; // No es necesario filtrar ni sanitizar porque es una opción predefinida
    $fecha_naci = filter_var($_POST['fecha_naci'], FILTER_SANITIZE_STRING);
    $tipo_doc = $_POST['tipo_doc']; // No es necesario filtrar ni sanitizar porque es una opción predefinida
    $doc = filter_var($_POST['doc'], FILTER_SANITIZE_STRING);
    $fecha_reg = date("Y-m-d"); // No necesita ser filtrada ya que es generada internamente
    $direccion = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
    $clave = filter_var($_POST['clave'], FILTER_SANITIZE_STRING);
    $clave2 = filter_var($_POST['clave2'], FILTER_SANITIZE_STRING);

    if (empty($email) || empty($clave) || empty($clave2) || empty($apellido)) {
        echo 'error_1'; // Campos obligatorios, por favor llena el email y las claves
    } else {
        // Validar correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'error_2'; // Por favor ingresa un correo válido
        } else {
            // Validar contraseña (mínimo 8 caracteres alfanuméricos)
            $caracteres_especiales_permitidos = '!@#$%^&*().';
            if (strlen($clave) < 8 || 
                !preg_match('/[A-Za-z]/', $clave) || 
                !preg_match('/[0-9]/', $clave) || 
                !preg_match('/[' . preg_quote($caracteres_especiales_permitidos, '/') . ']/', $clave)) {
                echo 'error_3'; // La contraseña no cumple con los requisitos mínimos de seguridad
            } else {
                // Confirmar que las contraseñas coincidan
                if ($clave !== $clave2) {
                    echo 'error_4'; // Las claves deben ser iguales, por favor inténtalo de nuevo
                } else {
                    // Incluir la clase usuario
                    require_once('../../model/usuario.php');

                    // Crear un objeto de la clase usuario
                    $usuario = new Usuario();

                    // Llamar al método registroUsuario para guardar los datos en la base de datos
                    $resultado = $usuario->registroUsuario2($nombre, $email, $clave, $tel, $apellido, $genero, $fecha_naci, $tipo_doc, $doc, $fecha_reg, $direccion);

                }
            }
        }
    }
?>
