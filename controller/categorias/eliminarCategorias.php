<?php
// Verificar si la variable POST está definida
if(isset($_POST['id_categoria'])) {
    $id_categoria = $_POST['id_categoria'];

    // Verificar si el ID de categoría no está vacío
    if(!empty($id_categoria)){
        // Incluir el archivo de conexión a la base de datos y la clase Categorias
        require_once('../../model/categorias.php');

        // Crear un objeto de la clase Categorias
        $categorias = new Categorias();

        // Llamar al método para eliminar la categoría
        $result = $categorias->eliminar_categorias($id_categoria);

        // Verificar si la eliminación fue exitosa
        if($result) {
           $response = array ("success" => true, "message" => "Venta eliminada de manera exitosa");
           echo json_encode($response);
           
           
        } else {
            echo 'error_3'; // Error al eliminar la categoría
        }
    } else {
        echo 'error_2'; // ID de categoría vacío
    }
} else {
    echo 'error_1'; // La variable POST "id_categoria" no está definida

       // Agregar var_dump para depurar la solicitud POST

}
?>


