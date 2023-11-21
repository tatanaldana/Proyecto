<?php

include_once('../../crud/conexion.php');

$codigo=$_GET['id_promo'];

mysqli_query($conexion, "DELETE FROM promocion WHERE id_promo = $codigo");

header("Location:../promociones.php");

?>