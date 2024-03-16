<?php

if (isset($_POST['idcarrito_php'])) {
    $idcarrito = $_POST['idcarrito_php'];
    // Aquí podrías sanitizar $buscar antes de utilizarlo en la consulta

     # Incluimos la clase usuario
    require_once('../../model/com_venta.php');
    require_once('../../model/carrito.php');
     # Creamos un objeto de la clase usuario
    $com_venta = new Com_venta();
    $carrito= new Carrito();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $com_venta->upgrade_venta($idcarrito);
    $resultado2=$carrito->cambiar_estado2($idcarrito);
//corregir error debe ser en la verificación de la funcion
if ($resultado) {
    // Verificar si la actualización en la tabla com_venta fue exitosa
    if ($resultado2) {
        // Verificar si la actualización en la tabla carrito fue exitosa
        $response = array("success" => true, "message" => "Venta completada exitosamente");
    } else {
        // Si la actualización en la tabla carrito falló
        $response = array("success" => false, "message" => "Error al actualizar en la tabla carrito");
    }
} else {
    // Si la actualización en la tabla com_venta falló
    $response = array("success" => false, "message" => "Error al actualizar en la tabla com_venta");
}
}
echo json_encode($response);
exit();
?>