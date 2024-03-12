<?php
Nuevasugerencia ($_POST['sugerencia'], $_POST['tipo_sugerencia'], date('Y-m-d H:i:s'), 1, $_POST['usuarios_id']);

function Nuevasugerencia($sugerencia, $tipo_sugerencia, $fecha_pqr, $estado, $usuarios_id)
{
    require_once 'conexion.php';

    $sentecia="INSERT INTO pqr (sugerencia, tipo_sugerencia, fecha_pqr, estado, usuarios_id)
    VALUES ('".$sugerencia."', '".$tipo_sugerencia."', '".$fecha_pqr."', 1, '".$usuarios_id."') "; 
    $conexion->query($sentecia) or die ("error al ingresar datos".mysqli_error($conexion));
}
?>

<script type="text/javascript">
alert("sugerencia registrada exitosamente");
window.location.href='sugerenciasuser.php';
</script>