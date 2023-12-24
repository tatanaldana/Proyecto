<?php
include '../crud/conexion.php';

if (isset($queryusuarios) && mysqli_num_rows($queryusuarios) > 0) {
    // Consulta SQL para obtener productos y precios
    $sql = "SELECT idProducto, nombre_pro, precio_pro FROM productos";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Inicializa los arrays para almacenar los productos y precios
        $productos = array();
        $precios = array();

        // Obtiene los datos de la tabla y los almacena en los arrays
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row["nombre_pro"];
            $precios[] = $row["precio_pro"];
        }
    } else {
        echo "No se encontraron productos en la base de datos.";
    }

    // Cierra la conexión a la base de datos
    $conexion->close();
} else {
    $mensaje = "";
}
?>

<?php
// Mostrar productos y precios en el formulario
if (isset($productos) && isset($precios)) {

    echo "<div class='container'>";
    echo "<div class='d-flex justify-content-center'>";
    echo "<div class='row'>";
    echo "<div class='col-md-12 table-responsive'>";
    echo "<form method='POST' action='../crud_ventas/agregar_venta.php'>";
    echo "<div class='form-group'>";
    echo "<label for='forma_pago'>Método de Pago:</label>";
    echo "<select name='forma_pago' id='forma_pago'>";
    echo  "<option value='efectivo'>Efectivo</option>";
    echo  "<option value='tarjeta'>Tarjeta de Crédito</option>";
    echo  "<option value='transferencia'>Transferencia Bancaria</option>";
    echo "</select>";
    echo "<div class='my-5'></div>";
    echo "<table class='table table-bordered border-primary' style='text-align:center'>";
    echo "<tr>";
    echo "<th scope='col'>Seleccionar</th>"; // Agregamos la columna de selección
    echo "<th scope='col'>Producto</th>";
    echo "<th scope='col'>Precio</th>";
    echo "<th scope='col'>Cantidad</th>";
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

        $subtotal = 0;
        if (isset($_POST['cantidad'][$key]) && is_numeric($_POST['cantidad'][$key])) {
            $cantidad = intval($_POST['cantidad'][$key]);
            $subtotal = $cantidad * $precios[$key];

            $detallesVenta[] = array(
                'producto' => $producto,
                'precio' => $precios[$key],
                'cantidad' => $cantidad,
                'subtotal' => $subtotal
            );
        }
        echo "<td><input type='text' name='subtotal[]' value='$subtotal' readonly></td>";

        $totalVenta += $subtotal; // Agregamos el subtotal al total de la venta
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td colspan='5'>Total Venta: <input type='text' name='totalVenta' id='totalVenta'value='$totalVenta' readonly></td>"; // Mostramos el total de la venta
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan='3'><input type='submit' class='btn btn-outline-primary' name='btnCalcular' value='Ingresar venta'></td>"; 
    echo "<td colspan='2'><a href='../ventas.php' class='btn btn-outline-primary' >Cancelar</a></td>";// Botón para calcular el total
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
        var subtotales = document.getElementsByName('subtotal[]');
        var totalVenta = 0;

        for (var i = 0; i < productos.length; i++) {
            var precio = parseFloat(precios[i].value);
            var cantidad = parseInt(cantidades[i].value);

            if (cantidad >= 1) {
                var subtotal = precio * cantidad;
            } else {
                var subtotal = 0;
            }

            subtotales[i].value = subtotal.toFixed(0); // Mostrar dos decimales en el subtotal
            totalVenta += subtotal;
        }

        // Actualizar el campo de total
        document.getElementById('totalVenta').value = totalVenta.toFixed(0);
    }

    // Función para habilitar/deshabilitar la cantidad según el checkbox
    function habilitarCantidad(key) {
        var checkbox = document.getElementsByName('seleccionar[]')[key];
        var cantidadInput = document.getElementById('cantidad_' + key);

        if (checkbox.checked) {
            cantidadInput.disabled = false;
        } else {
            cantidadInput.disabled = true;
            cantidadInput.value = 0; // Reiniciar la cantidad si está deshabilitada
        }

        calcularTotal(); // Volver a calcular el total
    }

    // Asociar la función al evento de cambio en las cantidades
    var cantidades = document.getElementsByName('cantidad[]');
    for (var i = 0; i < cantidades.length; i++) {
        cantidades[i].addEventListener('input', calcularTotal);
    }
</script>