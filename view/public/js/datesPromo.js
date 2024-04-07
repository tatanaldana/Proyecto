document.addEventListener('DOMContentLoaded', function() {
    // Verificamos que en la sesión del navegador exista el elemento llamado 'PromoData'
    var PromoData = sessionStorage.getItem('PromoData');
    console.log(PromoData);

    // Si el 'PromoData' existe, entonces convertimos el JSON almacenado en un array
    if (PromoData) {
        var PromoArray = JSON.parse(PromoData); // este es el array
        // Obtenemos los productos y precios del array
        var productos = PromoArray.productos;
        var precios = PromoArray.precios;

        var tablaHTML = '';
        tablaHTML += '<tr><th scope="col">Seleccionar</th><th scope="col">Producto</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Descuento</th><th scope="col">Subtotal</th></tr>';
        var totalVenta = 0;
        var detallesVenta = [];

        // Construimos las filas de la tabla dinámicamente
        for (var i = 0; i < productos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td><input type="checkbox" name="seleccionar[]" value="' + i + '" onchange="habilitarCantidad(' + i + ')"></td>';
            tablaHTML += '<td><input type="text" name="producto[]" value="' + productos[i] + '" readonly></td>';
            tablaHTML += '<td><input type="text" name="precio[]" value="' + precios[i] + '" readonly></td>';
            tablaHTML += '<td><input type="number" name="cantidad[]" min="1" value="0" id="cantidad_' + i + '" disabled></td>';
            tablaHTML += '<td><input type="number" name="descuento[]" min="1" value="0" id="descuento_' + i + '" disabled></td>';
            tablaHTML += '<td><input type="text" name="subtotal[]" value="" readonly></td>'; // Campo de subtotal vacío por ahora
            tablaHTML += '</tr>';
        }
        tablaHTML += '<tr><td colspan="6">Total Venta: <input type="text" name="totalVenta" id="totalVenta" value="0" readonly></td></tr>';

        // Insertamos la tabla en el elemento con id "TablaPromo"
        document.getElementById('TablaPromo').innerHTML = tablaHTML;
    }

    // Asociar la función actualizarSubtotal al evento input de todos los campos de cantidad
    var cantidades = document.getElementsByName('cantidad[]');
    for (var i = 0; i < cantidades.length; i++) {
        cantidades[i].addEventListener('input', calcularTotal);
    }

    // Asociar la función actualizarSubtotal al evento input de todos los campos de descuento
    var descuentos = document.getElementsByName('descuento[]');
    for (var i = 0; i < descuentos.length; i++) {
        descuentos[i].addEventListener('input', calcularTotal);
    }
});

// Función para calcular y actualizar los valores de subtotal y total
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

        if (isNaN(descuento) || descuento < 0 || descuento > 100) {
            alert("El descuento debe estar en el rango de 0% a 100%.");
            descuentos[i].value = ''; // Limpiar el campo en caso de un valor inválido
            descuento = 0; // Asignar un valor válido para continuar con los cálculos
        }

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
    descuentos[i].addEventListener('blur', function() {
        validarDescuento(i);
    });
}

// Función para validar el descuento en el rango de 0% a 100% cuando el campo pierde el foco
function validarDescuento(key) {
    var descuentoInput = document.getElementsByName('descuento[]')[key];
    var descuento = descuentoInput.value.trim(); // Eliminar espacios en blanco al inicio y al final

    // Verificar si el campo de descuento está vacío o si el valor está fuera del rango
    if (descuento !== "") {
        descuento = parseFloat(descuento); // Convertir a número
        if (isNaN(descuento) || descuento < 0 || descuento > 100) {
            alert("El descuento debe estar en el rango de 0% a 100%.");
            descuentoInput.value = ''; // Limpiar el campo en caso de un valor inválido
            calcularTotal(); // Volver a calcular el total después de la validación
        }
    }

}
var descuentos = document.getElementsByName('descuento[]');
for( var i=0;i<descuentos.lenght;i++){
descuentos[i].addEventListener('blur',function(){
    validarDescuento(i);
});
}