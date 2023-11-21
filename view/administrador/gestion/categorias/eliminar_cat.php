<?php

include_once('../../crud/conexion.php');

$codigo=$_GET['id_cat'];

mysqli_query($conexion, "DELETE FROM categorias WHERE id_categoria = $codigo");

header("Location:../categorias_adm.php");

?>