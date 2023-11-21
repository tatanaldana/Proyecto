<?php

include_once ('../../crud/conexion.php');
    

   
    $referencia = $_POST['referencia'];
    $descripcion = $_POST['descripcion'];
    $existencia = $_POST['existencia'];
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];
    $stock = $_POST['stock'];
    
    
   

    mysqli_query($conexion,"INSERT INTO mat_pri (referencia,descripcion,existencia,entrada,salida,stock) VALUES ('$referencia','$descripcion','$existencia','$entrada','$salida','$stock')");

    header("Location:../ma_prima.php");
    

?>