<?php

include_once('../../crud/conexion.php');

$codigo=$_GET['idproducto'];

mysqli_query($conexion, "DELETE FROM productos WHERE idproducto = $codigo");

header("Location:../productos_adm.php");

?>