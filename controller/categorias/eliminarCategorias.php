<?php
// Verificar si la variable POST está definida
if(isset($_POST['id_categoria'])) {
    $id_categoria = $_POST['id_categoria'];

    if(empty($id_categoria)){
        # Incluimos la clase Categorias
        require_once('../../model/categorias.php');

        # Creamos un objeto de la clase Categorias
        $categorias = new Categorias();

        # Llamamos una variable para guardar el resultado de la búsqueda, para luego pasarlos a JSON y poder enviarlos al formulario de editar
        $categorias->eliminar_categorias($id_categoria);
    }
} else {
    echo 'error_1'; // La variable POST "id_categoria" no está definida
}
?>


