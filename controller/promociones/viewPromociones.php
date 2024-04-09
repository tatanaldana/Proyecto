<?php
if (isset($_POST['id_promo'])) {
    $id_promo = $_POST['id_promo'];
    // Aquí podrías sanitizar $id_promo antes de utilizarlo en la consulta

     # Incluimos la clase promocion
    require_once('../../model/det_promo.php');
     # Creamos un objeto de la clase promocion
    $det_promo = new Det_promo();
    # Llamamos al metodo  para realizar la consulta en la base de datos
    $resultado = $det_promo->detalle_promo($id_promo);

    if ($resultado) {
        #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
        $json_response = json_encode($resultado);
        echo $json_response;
    } else {
        $error = array('error' => 'No se encontraron datos de la promocion');
        echo json_encode($error);
    }
} else {
    $error = array('error' => 'Parámetros incorrectos');
    echo json_encode($error);
}
?>
