<?php
if (isset($_POST['fecha_inicial_php']) && isset($_POST['fecha_final_php']) ) {

    $fecha_inicial = $_POST['fecha_inicial_php'];
    $fecha_final=$_POST['fecha_final_php'];
    # Incluimos la clase usuario
    require_once('../../model/com_venta.php');
     # Creamos un objeto de la clase usuario
    $com_venta = new Com_venta();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $com_venta->total_venta_x_fecha($fecha_inicial,$fecha_final);

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos del usuario');
        echo json_encode($error);
    }
}
?>