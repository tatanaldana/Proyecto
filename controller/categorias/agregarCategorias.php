<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_cat = $_POST['nombre_cat'];

    if (empty($nombre_cat)) {
        echo 'error_1'; // Un campo está vacío y es obligatorio
    } else {
        try {
            // Incluimos la clase categorias
            require_once('../../model/categorias.php');

            # Creamos un objeto de la clase de categorias
            $categorias = new Categorias();

            # Llamamos al método categorias para validar los datos de la base de datos 
            $categorias->insert_categorias($nombre_cat);
            
            echo 'Registro exitoso'; // Puedes enviar cualquier mensaje de éxito que desees
        } catch (PDOException $e) {
            echo 'error en el registro';
        }
    }
}
?>
