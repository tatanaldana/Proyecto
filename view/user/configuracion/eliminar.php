<?php

$doc = $_POST['deleteUsuario'];

if(isset($doc)){
    # Incluimos la clase usuario
    require_once('../../../model/usuario.php');

    # Creamos un objeto de la clase usuario
    $usuario = new Usuario();

    # Verificar si existen referencias en la tabla com_venta
    if ($usuario->verificar_referencias($doc)) {
        // Si existen referencias, mostrar un mensaje de error
        echo 'No se puede eliminar el usuario debido a que tiene registros asociados en la tabla com_venta.';
    } else {
        // Si no hay referencias, proceder con la eliminación del usuario
        if ($usuario->delete_usuario($doc)) {
            echo 'eliminacion exitosa';
            // Si deseas redirigir después de la eliminación exitosa, utiliza header
         
        } else {
            echo 'No se pudo eliminar el usuario';
        }
    }
}

?>
