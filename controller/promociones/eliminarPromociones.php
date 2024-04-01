<?php
// Verificar si la variable POST está definida
if(isset($_POST['id_promo'])) {
    $id_promo = $_POST['id_promo'];

    // Verificar si el id_promo no está vacío
    if(!empty($id_promo)){
        // Incluir el archivo de conexión a la base de datos y la clase Promocion
        require_once('../../model/promocion.php');

        // Crear un objeto de la clase Promocion
        $promocion = new Promocion();

        // Llamar al método para eliminar la promocion
        $result = $promocion->eliminar_promocion($id_promo);

        // Verificar si la eliminación fue exitosa
        if($result) {
           $response = array ("success" => true, "message" => "promocion eliminada de manera exitosa");
           echo json_encode($response);

        } else {
            $response = array ("success" => false, "message" => "Error al eliminar la promocion");
            echo json_encode($response);
        }
          
        } else {
              echo 'error_2'; // ID de promocion vacío
        }

        } else {
            echo 'error_1'; // La variable POST "id_promo" no está definida

       // Agregar var_dump para depurar la solicitud POST

}

?>
