<?php
include '../../crud/conexion.php';

$sql = "SELECT idProducto, nombre_pro, precio_pro FROM productos";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Inicializa los arrays para almacenar los productos, precios y descuentos
    $productos = array();
    $precios = array();
    $descuentos = array();

    // Obtiene los datos de la tabla y los almacena en los arrays
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row["nombre_pro"];
        $precios[] = $row["precio_pro"];
        $descuentos[] = 0; // Inicialmente, no hay descuento
    }
} else {
    echo "No se encontraron productos en la base de datos.";
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<?php
// Mostrar productos, precios y descuentos en el formulario
if (isset($productos) && isset($precios) && isset($descuentos)) {

    echo "<div class='container'>";
    echo "<div class='d-flex justify-content-center'>";
    echo "<div class='row'>";
    echo "<div class='col-md-12 table-responsive'>";
    echo "<form method='POST' action='../crud_promocion/agregar_promo.php'>";
    echo "<table class='table table-bordered border-primary' style='text-align:center'>";
    echo "<tr>";
    echo "<th scope='col' colspan='3'>Nombre Promocion</th>"; // Agregamos la columna de selección
    echo "<th><input type='text' name='nombre_prom'></th>";
    echo "</tr>";
    echo '</table>';
    echo "<div class='my-5'></div>";
    echo "<table class='table table-bordered border-primary' style='text-align:center'>";
    echo "<tr>";
    echo "<th scope='col'>Seleccionar</th>"; // Agregamos la columna de selección
    echo "<th scope='col'>Producto</th>";
    echo "<th scope='col'>Precio</th>";
    echo "<th scope='col'>Cantidad</th>";
    echo "<th scope='col'>Descuento (%)</th>"; // Nueva columna para el descuento
    echo "<th scope='col'>Subtotal</th>";
    echo "</tr>";

    $totalVenta = 0;
    $detallesVenta = array();

    foreach ($productos as $key => $producto) {
        echo "<tr>";
        // Agregamos un checkbox para seleccionar/deseleccionar el producto
        echo "<td><input type='checkbox' name='seleccionar[]' value='$key' onchange='habilitarCantidad($key)'></td>";
        echo "<td><input type='text' name='producto[]' value='$producto' readonly></td>";
        echo "<td><input type='text' name='precio[]' value='{$precios[$key]}' readonly></td>";
        echo "<td>";
        echo "<input type='number' name='cantidad[]' min='1' value='0'";
        // Agregamos un identificador único a cada campo de cantidad
        echo " id='cantidad_$key'";
        // Si el producto no está seleccionado, deshabilitamos la cantidad
        echo isset($_POST['seleccionar']) && in_array($key, $_POST['seleccionar']) ? '' : ' disabled';
        echo "></td>";

        // Nuevo campo de entrada para el descuento
        echo "<td><input type='number' name='descuento[]' min='0' max='100' value='{$descuentos[$key]}'";
        echo " onblur='validarDescuento($key)'"; // Llama a la función de validación cuando se desenfoca
        echo isset($_POST['seleccionar']) && in_array($key, $_POST['seleccionar']) ? '' : ' disabled';
        echo "></td>";

        $subtotal = 0;
        if (isset($_POST['cantidad'][$key]) && is_numeric($_POST['cantidad'][$key])) {
            $cantidad = intval($_POST['cantidad'][$key]);
            $precio = $precios[$key];

            // Aplicar el descuento al precio
            $descuento = isset($_POST['descuento'][$key]) ? floatval($_POST['descuento'][$key]) : 0;
            $precioConDescuento = $precio * (1 - $descuento / 100);

            $subtotal = $cantidad * $precioConDescuento;

            $detallesVenta[] = array(
                'producto' => $producto,
                'precio' => $precioConDescuento,
                'cantidad' => $cantidad,
                'subtotal' => $subtotal
            );
        }
        echo "<td><input type='text' name='subtotal[]' value='$subtotal' readonly></td>";

        $totalVenta += $subtotal; // Agregamos el subtotal al total de la venta
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td colspan='6'>Total Venta: <input type='text' name='totalVenta' id='totalVenta'value='$totalVenta' readonly></td>"; // Mostramos el total de la venta
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='3'><input type='submit' class='btn btn-outline-primary' name='btnCalcular' value='Ingresar venta'></td>";// Botón para calcular el total 
    echo "<td colspan='3'><a href='../promociones.php' class='btn btn-outline-primary' >Cancelar</a></td>";
    echo "</tr>";
    echo '</table>';
    echo "</form>"; // Cerramos el formulario
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>

<script>
    // Función para calcular y actualizar los valores de subtotal y total
    function calcularTotal() {
        var productos = document.getElementsByName('producto[]');
        var precios = document.getElementsByName('precio[]');
        var cantidades = document.getElementsByName('cantidad[]');
        var descuentos = document.getElementsByName('descuento[]'); // Nuevos descuentos
        var subtotales = document.getElementsByName('subtotal[]');
        var totalVenta = 0;

        for (var i = 0; i < productos.length; i++) {
            var precio = parseFloat(precios[i].value);
            var cantidad = parseInt(cantidades[i].value);
            var descuento = parseFloat(descuentos[i].value); // Nuevo descuento

            if (cantidad >= 1) {
                // Aplicar el descuento al precio
                var precioConDescuento = precio * (1 - descuento / 100);
                var subtotal = precioConDescuento * cantidad;
            } else {
                var subtotal = 0;
            }

            subtotales[i].value = subtotal.toFixed(0); // Mostrar dos decimales en el subtotal
            totalVenta += subtotal;
        }

        // Actualizar el campo de total
        document.getElementById('totalVenta').value = totalVenta.toFixed(0);
    }

    // Función para habilitar/deshabilitar la cantidad y descuento según el checkbox
    function habilitarCantidad(key) {
        var checkbox = document.getElementsByName('seleccionar[]')[key];
        var cantidadInput = document.getElementById('cantidad_' + key);
        var descuentoInput = document.getElementsByName('descuento[]')[key];

        if (checkbox.checked) {
            cantidadInput.disabled = false;
            descuentoInput.disabled = false; // Habilitar el descuento
        } else {
            cantidadInput.disabled = true;
            descuentoInput.disabled = true; // Deshabilitar el descuento
            cantidadInput.value = 0; // Reiniciar la cantidad si está deshabilitada
            descuentoInput.value = 0; // Reiniciar el descuento si está deshabilitado
        }

        calcularTotal(); // Volver a calcular el total
    }

    // Asociar la función al evento de cambio en las cantidades
    var cantidades = document.getElementsByName('cantidad[]');
    for (var i = 0; i < cantidades.length; i++) {
        cantidades[i].addEventListener('input', calcularTotal);
    }

    // Asociar la función al evento de cambio en los descuentos
    var descuentos = document.getElementsByName('descuento[]');
    for (var i = 0; i < descuentos.length; i++) {
        descuentos[i].addEventListener('input', calcularTotal);
    }

    // Función para validar el descuento en el rango de 0% a 100%
    function validarDescuento(key) {
        var descuentoInput = document.getElementsByName('descuento[]')[key];
        var descuento = parseFloat(descuentoInput.value);

        if (isNaN(descuento) || descuento < 0 || descuento > 100) {
            alert("El descuento debe estar en el rango de 0% a 100%.");
            descuentoInput.value = ''; // Limpiar el campo en caso de un valor inválido
        }
    }
</script>