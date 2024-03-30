
<?php

    $nombre_cat = $_POST['categoria'];

    if(empty($nombre_cat)){
        echo 'error_1'; // Un campo está vacío y es obligatorio
    } else {
        try {
            // Incluimos la clase Categorias
            require_once('../../model/categorias.php');

            // Creamos un objeto de la clase Categorias
            $categorias = new Categorias();

            // Llamamos al método insert_categorias para insertar los datos en la base de datos
            $categorias->insert_categorias($nombre_cat);
        } catch(PDOException $e) {
            echo 'error en el registro';
        }
    }

?>
