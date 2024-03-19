document.addEventListener('DOMContentLoaded', function() {
    // Verificamos que en la sesión del navegador exista el elemento llamado 'ProductosData'
    var ProductosData = sessionStorage.getItem('ProductosData');
    console.log(ProductosData);
  
    // Si el 'ProductosData' existe, entonces convertimos el JSON almacenado en un array
    if (ProductosData) {
        var ProductosArray = JSON.parse(ProductosData); // este es el array
        // Obtenemos los productos y precios del array
        var productos = ProductosArray.productos;
        var precios = ProductosArray.precios;

        var tablaHTML = '';
        tablaHTML += '<tr><th scope="col">Seleccionar</th><th scope="col">Producto</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Subtotal</th></tr>';
    
        var totalVenta = 0;
        var detallesVenta = [];

        // Construimos las filas de la tabla dinámicamente
        for (var i = 0; i < productos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td><input type="checkbox" name="seleccionar[]" value="' + i + '" onchange="habilitarCantidad(' + i + ')"></td>';
            tablaHTML += '<td><input type="text" name="producto[]" value="' + productos[i] + '" readonly></td>';
            tablaHTML += '<td><input type="text" name="precio[]" value="' + precios[i] + '" readonly></td>';
            tablaHTML += '<td><input type="number" name="cantidad[]" min="1" value="0" id="cantidad_' + i + '" disabled></td>';
            tablaHTML += '<td><input type="text" name="subtotal[]" value="" readonly></td>'; // Campo de subtotal vacío por ahora
            tablaHTML += '</tr>';
        }
        tablaHTML += '<tr><td colspan="5">Total Venta: <input type="text" name="totalVenta" id="totalVenta" value="0" readonly></td></tr>';

        // Insertamos la tabla en el elemento con id "TablaProductos"
        $('#TablaProductos').html(tablaHTML);

        // Asociar la función actualizarSubtotal al evento input de todos los campos de cantidad
        var cantidades = document.getElementsByName('cantidad[]');
        for (var i = 0; i < cantidades.length; i++) {
            cantidades[i].addEventListener('input', function() {
                var index = this.id.split('_')[1]; // Obtener el índice del producto desde el id del campo de cantidad
                actualizarSubtotal(index);
            });
        }
    } else {
        console.log("No se han encontrado datos de los productos");
    }
});

// Función para calcular y actualizar los valores de subtotal y total
function calcularTotal() {
    var productos = document.getElementsByName('producto[]');
    var precios = document.getElementsByName('precio[]');
    var cantidades = document.getElementsByName('cantidad[]');
    var subtotales = document.getElementsByName('subtotal[]');
    var totalVenta = 0;
    var detallesVenta = []; // Array para almacenar los detalles de la venta

    for (var i = 0; i < productos.length; i++) {
        var checkbox = document.getElementsByName('seleccionar[]')[i];
        var cantidad = parseInt(cantidades[i].value);

        if (checkbox.checked && cantidad >= 1) {
            var precio = parseFloat(precios[i].value);
            var subtotal = precio * cantidad;
            // Agregar detalles de venta solo si el checkbox está marcado y la cantidad es mayor que 0
            detallesVenta.push({
                producto: productos[i].value,
                precio: precio,
                cantidad: cantidad,
                subtotal: subtotal
            });
            subtotales[i].value = subtotal.toFixed(0); // Mostrar dos decimales en el subtotal
            totalVenta += subtotal;
        } else {
            // Si el checkbox no está marcado o la cantidad es 0, establecer el subtotal como 0
            subtotales[i].value = 0;
        }
    }

    // Actualizar el campo de total
    document.getElementById('totalVenta').value = totalVenta.toFixed(0);

    // Agregar los detalles de venta al FormData
    return detallesVenta; // Devolver el array de detalles de venta
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

    actualizarSubtotal(key);
}

function actualizarSubtotal(key) {
    var cantidadInput = document.getElementById('cantidad_' + key);
    var cantidad = parseInt(cantidadInput.value);
    var precio = parseFloat(document.getElementsByName('precio[]')[key].value);
    var subtotalInput = document.getElementsByName('subtotal[]')[key];
    var totalVentaInput = document.getElementById('totalVenta');
    var subtotal = cantidad * precio;

    subtotalInput.value = subtotal.toFixed(0); // Mostrar dos decimales en el subtotal

    var subtotales= document.getElementsByName('subtotal[]');
    var totalVenta=0;
    for (var i=0; i< subtotales.length;i++){
        totalVenta +=parseFloat(subtotales[i].value);
    }
         
    // Llamar a la función calcularTotal para recalcular el total de la venta
    calcularTotal();
}