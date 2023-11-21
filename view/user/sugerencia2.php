<?php
Nuevasugerencia ($_POST['sugerencia'], $_POST['tipo_sugerencia']);

function Nuevasugerencia($sugerencia, $tipo_sugerencia)
{
require_once 'conexion.php';

$sentecia="INSERT INTO pqr (sugerencia, tipo_sugerencia)
VALUES ('".$sugerencia."', '".$tipo_sugerencia."') "; 
$conexion->query($sentecia) or die ("error al ingresar datos".mysqli_error($conexion));
}
?>

<script type="text/javascript">
alert("sugerencia registrada exitosamente");
window.location.href='sugerenciasusrer.php';
</script>