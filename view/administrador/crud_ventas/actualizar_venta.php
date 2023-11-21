<?php
include_once '..\crud\conexion.php';

if (isset($_GET['doc'])) {
    $idCarrito = $_GET['doc'];

    // Actualizar la columna 'estado' en la tabla 'com_venta'(ya esta la funcion en el modelo com_venta)
    $sqlUpdateComVenta = "UPDATE com_venta SET estado = 2 WHERE carrito_idcarrito = '$idCarrito'";
    if ($conexion->query($sqlUpdateComVenta) === TRUE) {
        // Actualizar la columna 'estado' en la tabla 'carrito'
        $sqlUpdateCarrito = "UPDATE carrito SET estado = 2 WHERE idcarrito ='$idCarrito'";
        if ($conexion->query($sqlUpdateCarrito) === TRUE) {
            // Muestra un cuadro emergente de confirmación
            echo '<script type="text/javascript">
                    alert("Venta completada exitosamente");
                    window.location.href="../ventas/ver_ventas.php";
                  </script>';
        } else {
            echo "Error al actualizar el estado en la tabla 'carrito': " . $conexion->error;
        }
    } else {
        echo "Error al actualizar el estado en la tabla 'com_venta': " . $conexion->error;
    }
} else {
    echo "No se proporcionó el valor del ID del carrito.";
}
?>

