<?php

include_once('../../crud/conexion.php');


$nombre_pro = $_POST['nombre_pro'];
$detalle = $_POST['detalle'];
$precio_pro = $_POST['precio_pro'];
$categoria = $_POST['opciones'];
$codigo = $_POST['cod'];

// Obtén la URL de la imagen
$foto = $_POST['foto'];
// Verifica si la URL de la imagen es válida
if (filter_var($foto, FILTER_VALIDATE_URL)) {

    mysqli_query($conexion, "INSERT INTO productos(nombre_pro,detalle,precio_pro,categorias_idcategoria,cod,foto) VALUES ('$nombre_pro','$detalle','$precio_pro','$categoria','$codigo','$foto')");

    header("Location:../productos_adm.php");
} else {
    echo "Error, la URL de la imagen no es válida";
}
