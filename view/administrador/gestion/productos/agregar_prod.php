<?php

include_once ('../../crud/conexion.php');
    
   
    $nombre_pro=$_POST['nombre_pro'];
    $detalle=$_POST['detalle'];
    $precio_pro=$_POST['precio_pro'];
    $categoria=$_POST['opciones'];
    $codigo=$_POST['cod'];
    
   

    mysqli_query($conexion,"INSERT INTO productos(nombre_pro,detalle,precio_pro,categorias_idcategoria,cod) VALUES ('$nombre_pro','$detalle','$precio_pro','$categoria','$codigo')");

    header("Location:../productos_adm.php");
    

?>

