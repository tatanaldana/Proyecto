<?php

include_once('../crud/conexion.php');

$idCarrito = $_GET['doc'];

// Comenzar una transacción
mysqli_begin_transaction($conexion);

// Intentar eliminar de la tabla 'com_venta'(ya esta la funcion en el modelo com_venta)
$queryComVenta = "DELETE FROM com_venta WHERE carrito_idcarrito = $idCarrito";
$resultComVenta = mysqli_query($conexion, $queryComVenta);

// Intentar eliminar de la tabla 'carrito'
$queryCarrito = "DELETE FROM carrito WHERE idcarrito = $idCarrito";
$resultCarrito = mysqli_query($conexion, $queryCarrito);

if ($resultComVenta && $resultCarrito) {
    // Si ambas eliminaciones son exitosas, confirma la transacción
    mysqli_commit($conexion);
    echo "Registros eliminados exitosamente.";
} else {
    // Si ocurre algún error, realiza un rollback de la transacción
    mysqli_rollback($conexion);
    echo "Error al eliminar registros.";
}

// Redirige a la página de visualización de ventas
header("Location: ../ventas/ver_ventas.php");
?>

