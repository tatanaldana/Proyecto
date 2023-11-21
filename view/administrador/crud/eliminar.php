<?php

include_once('..\crud\conexion.php');

$codigo=$_GET['doc'];

mysqli_query($conexion, "DELETE FROM usuarios WHERE doc = $codigo");

header("Location: ..\clientes.php");
?>