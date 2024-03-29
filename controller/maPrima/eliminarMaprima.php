<?php
// Verificar si la variable POST está definida
if(isset($_POST['cod_materia_pri'])) {
    $cod_materia_pri = $_POST['cod_materia_pri'];

    // Verificar si el ID de categoría no está vacío
    if(!empty($cod_materia_pri)){
        // Incluir el archivo de conexión a la base de datos y la clase Categorias
        require_once('../../model/mat_prima.php');

        // Crear un objeto de la clase Categorias
        $mat_prima = new Mat_prima();

        // Llamar al método para eliminar la categoría
        $result = $mat_prima->eliminar_mat_prima($cod_materia_pri);

        // Verificar si la eliminación fue exitosa
        if($result) {
           $response = array ("success" => true, "message" => "categoria eliminada de manera exitosa");
           echo json_encode($response);

        } else {
            $response = array ("success" => false, "message" => "Error al eliminar la materia prima");
            echo json_encode($response);
        }
          
        } else {
              echo 'error_2'; // ID de categoría vacío
        }

        } else {
            echo 'error_1'; // La variable POST "id_categoria" no está definida

       // Agregar var_dump para depurar la solicitud POST

}

?>
