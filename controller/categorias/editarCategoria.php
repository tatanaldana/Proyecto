<?php
// Se verifica que se hayan enviado datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se obtienen los datos enviados del formulario
    $id_categoria = $_POST['id_categoria'];
    $nombre_cat = $_POST['nombre_cat'];
    
    // Se verifica que ningún dato esté vacío
    if (empty($id_categoria) || empty($nombre_cat)) {
        echo 'error_1'; // Un campo está vacío y es obligatorio
    } else {
        try {
            // Incluimos la clase Categorias
            require_once('model/categoria.php');
    
            // Creamos un objeto de la clase Categorias
            $categorias = new Categorias();
    
            // Llamamos al método update_categorias para realizar la actualización de los datos en la base de datos
            $categorias->update_categorias($id_categoria, $nombre_cat);
            
            // Se redirecciona al usuario después de realizar la actualización
            header('Location: ../../categorias.php');
            exit();
        } catch (PDOException $e) {
            echo 'Error en el registro';
        }
    }
} else {
    // Si no se ha enviado ninguna solicitud POST, se muestra un mensaje de error
    echo 'error_2'; // No se han enviado datos mediante POST
}
?>
