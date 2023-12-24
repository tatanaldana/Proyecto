<?php

include_once ('../../crud/conexion.php');
    

    $nombre_cat=$_POST['nombre_cat'];
    
    


    mysqli_query($conexion,"INSERT INTO categorias(nombre_cat) VALUES ('$nombre_cat')");

    header("Location: ../categorias_adm.php");
    

?>
