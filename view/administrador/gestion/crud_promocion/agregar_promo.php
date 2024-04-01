<?php
require_once("../../../../model/conexion.php");

$conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion
$conexion->conexion(); // Establecer la conexión a la base de datos
$conexion->set_names(); // Establecer el juego de caracteres

if (isset($_POST['btnCalcular'])) {
    // Obtén la fecha actual
    $nombrepromocion = $_POST['nombre_prom'];
    $totalventa = $_POST['totalVenta'];
    $categoria=3;

    $sqlInsertpromocion = "INSERT INTO promocion (nom_promo,totalpromo,categorias_idcategoria) VALUES ('$nombrepromocion','$totalventa','$categoria')";

    // Ejecutar la consulta para insertar en la tabla `carrito`
    if ($conexion->larausequery($sqlInsertpromocion) === TRUE) {
        // Obtener arrays de productos, precios, cantidades, etc. desde el formulario
        $idpromocion = $conexion->conexion()->lastInsertId();
        $productos = $_POST['producto'];
        $precios = $_POST['precio'];
        $cantidades = $_POST['cantidad'];
        $descuentos=$_POST['descuento'];
        $subtotales = $_POST['subtotal'];
        $totalventa = $_POST['totalVenta'];
        

        // Inicializa un flag para controlar si se completaron todas las inserciones
        $todasInsercionesExitosas = true;
        $productosInsertados=array();
        // Iterar sobre los arrays y realizar la inserción en la tabla `com_venta`
        foreach ($productos as $key => $producto) {
            $precio = $precios[$key];
            $cantidad =isset($cantidades[$key]) ? $cantidades[$key]:0;
            $descuento =isset($descuentos[$key]) ? $descuentos[$key]:0;
            $subtotal = $subtotales[$key];
            
            if($cantidad>0 && !in_array($producto,$productosInsertados)){
            // Consulta SQL para insertar cada fila en la tabla `com_venta`
            $sqlInsertDetPromo = "INSERT INTO det_promo (nom_prod, pre_prod, cantidad,descuento, subtotal, total, promocion_idpromo)
             VALUES ( '$producto', '$precio', '$cantidad','$descuento', '$subtotal', '$totalventa', '$idpromocion')";
            
            if (!$conexion->larausequery($sqlInsertDetPromo)) {

                $todasInsercionesExitosas = false;
                
            }
                else{
                // Si una inserción falla, marca el flag como falso
                $productosInsertados[]=$producto;
            }
        }
    }

        if ($todasInsercionesExitosas) {
            // Redirige solo si todas las inserciones fueron exitosas
            echo '<script type="text/javascript">
            alert("Venta ingresada exitosamente");
            window.location.href="../../forms/promociones.php";
          </script>';
            exit();
        } else {
            echo "Ha ocurrido un error en alguna inserción.";
        }
    }
}
?>