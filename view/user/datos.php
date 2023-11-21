<?php


require_once 'conexion.php';


$consulta = "SELECT * FROM usuarios WHERE id = '".$_SESSION['id']. "' ";

$resultado = mysqli_query($conexion, $consulta);

 while ($row = mysqli_fetch_assoc($resultado)):
    echo '<div>';
    $_SESSION['apellido'] = $row['apellido'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['genero'] = $row['genero'];
    $_SESSION['fecha_naci'] = $row['fecha_naci'];
    $_SESSION['tipo_doc'] = $row['tipo_doc'];
    $_SESSION['doc'] = $row['doc'];
    $_SESSION['tel'] = $row['tel'];
    $_SESSION['direccion'] = $row['direccion'];

    echo '</div>';

   endwhile;

