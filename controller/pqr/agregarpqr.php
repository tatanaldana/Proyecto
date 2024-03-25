<?php
session_start();
$sugerencia   = $_POST['sugerencia'];
$tipo_sugerencia   = $_POST['tipo_sugerencia'];
$fecha_pqr  = date('Y-m-d H:i:s');
$usuarios_id  = $_SESSION["doc"];



if (empty($sugerencia) || empty($tipo_sugerencia)) {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

} else {

    # Incluimos la clase usuario
    require_once('../../model/pqr.php');

    # Creamos un objeto de la clase usuario
    $pqr = new PQR();

    # Llamamos al metodo login para validar los datos en la base de datos
    $pqr->insert_pqr($sugerencia, $tipo_sugerencia, $fecha_pqr, $usuarios_id);
}
header("Location:../../view/user/sugerenciasuser.php");
?>