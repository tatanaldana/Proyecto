<?php

include_once('../../crud/conexion.php');

$codigo=$_GET['id_ma_prima'];

mysqli_query($conexion, "DELETE FROM mat_pri WHERE cod_materia_pri = $codigo");

header("Location:../ma_prima.php");

?>