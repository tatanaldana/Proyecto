<?php
// Verificar si la variable POST está definida
if(isset($_POST['id_promo'])) {
    $id_promo = $_POST['id_promo'];

    // Verificar si el id_promo no está vacío
    if(!empty($id_promo)){
        // Incluir el archivo de conexión a la base de datos y la clase Promocion
        require_once '../../model/det_promo.php';
        require_once '../../model/promocion.php';

        // Crear un objeto de la clase Promocion
        $promocion = new Promocion();
        $det_promo = new Det_promo();

        // Llamar al método para eliminar la promocion
        $resultado1 = $promocion->eliminar_promocion($id_promo);
        $resultado2=$det_promo->eliminar_promo($id_promo);
        // Verificar si la eliminación fue exitosa
        if ($resultado1) {
            // Verificar si la actualización en la tabla com_venta fue exitosa
            if ($resultado2) {
                // Verificar si la actualización en la tabla carrito fue exitosa
                $response = array("success" => true, "message" => "Promocion eliminada exitosamente");
            } else {
                // Si la actualización en la tabla carrito falló
                $response = array("error" => false, "message" => "Error al eliminar en la tabla detalle de promocion");
            }
        } else {
            // Si la actualización en la tabla com_venta falló
            $response = array("error" => false, "message" => "Error al eliminar en la tabla promocion");
        }
        }
        echo json_encode($response);
        exit();
          
        } else {
              echo 'error_1'; // ID de promocion vacío
        }

?>
