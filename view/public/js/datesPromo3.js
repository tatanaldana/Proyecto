document.addEventListener('DOMContentLoaded', function() {
    // Verificar si hay datos en sessionStorage para la tabla de productos
    if (sessionStorage.getItem('PromoData')) {
        var PromoData = sessionStorage.getItem('PromoData');
        console.log(PromoData);
        if (PromoData) {
            var PromoArray = JSON.parse(PromoData);
            var productos = PromoArray.productos;
            var precios = PromoArray.precios;

            var tablaHTML = '';
            tablaHTML += '<tr><th scope="col">Seleccionar</th><th scope="col">Producto</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Descuento</th><th scope="col">Subtotal</th></tr>';

            for (var i = 0; i < productos.length; i++) {
                tablaHTML += '<tr>';
                tablaHTML += '<td><input type="checkbox" name="seleccionar[]" value="' + i + '" onchange="habilitarCantidad(' + i + ')"></td>';
                tablaHTML += '<td><input type="text" name="producto[]" value="' + productos[i] + '" readonly></td>';
                tablaHTML += '<td><input type="text" name="precio[]" value="' + precios[i] + '" readonly></td>';
                tablaHTML += '<td><input type="number" name="cantidad[]" min="1" value="0" id="cantidad_' + i + '" disabled></td>';
                tablaHTML += '<td><input type="number" name="descuento[]" min="1" value="0" id="descuento_' + i + '" disabled></td>';
                tablaHTML += '<td><input type="text" name="subtotal[]" value="" readonly></td>';
                tablaHTML += '</tr>';
            }
            tablaHTML += '<tr><td colspan="6">Total Venta: <input type="text" name="totalVenta" id="totalVenta"  readonly></td></tr>';

            document.getElementById('TablaPromo').innerHTML = tablaHTML;
        } 
    }  

    // Obtener detalles de promoción y marcar los productos correspondientes
    if (sessionStorage.getItem('detpromoData')) {
        var det_promoData = sessionStorage.getItem('detpromoData');
        console.log(det_promoData);
        if (det_promoData) {
            var detPromoArray = JSON.parse(det_promoData);
            var promo = detPromoArray[0];
            document.getElementById('nombre_prom').value = promo.nom_promo;
            document.getElementById('Idpromo').value = promo.id_promo;
            document.getElementById('Idpromo').disabled = true;
            document.getElementById('doc_hidden').value = promo.id_promo;
            document.getElementById('totalVenta').value = promo.totalpromo;

            for (var i = 0; i < detPromoArray.length; i++) {
                var producto = detPromoArray[i].nom_prod;
                var index = productos.findIndex(p => p === producto); // Buscar el índice del producto en la lista
                if (index !== -1) {
                    document.getElementsByName('seleccionar[]')[index].checked = true; // Marcar el checkbox correspondiente
                    // Llenar los datos asociados al producto
                    document.getElementsByName('cantidad[]')[index].value = detPromoArray[i].cantidad;
                    document.getElementsByName('descuento[]')[index].value = detPromoArray[i].descuento;
                    var subtotal = detPromoArray[i].cantidad * precios[index] * (1 - detPromoArray[i].descuento / 100);
                    document.getElementsByName('subtotal[]')[index].value = subtotal;
                    // Habilitar los campos de cantidad y descuento
                    document.getElementById('cantidad_' + index).disabled = false;
                    document.getElementById('descuento_' + index).disabled = false;
                }
            }
        }
    }

    // Asociar la función calcularTotal al evento input de todos los campos de cantidad
    var cantidades = document.getElementsByName('cantidad[]');
    for (var i = 0; i < cantidades.length; i++) {
        cantidades[i].addEventListener('input', calcularTotal);
    }

    // Asociar la función calcularTotal al evento input de todos los campos de descuento
    var descuentos = document.getElementsByName('descuento[]');
    for (var i = 0; i < descuentos.length; i++) {
        descuentos[i].addEventListener('input', calcularTotal);
    }

    // Asociar la función habilitarCantidad al evento change de todos los checkboxes de selección
    var checkboxes = document.getElementsByName('seleccionar[]');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function() {
            habilitarCantidad(this.value);
        });
    }
});

function calcularTotal() {
    var productos = document.getElementsByName('producto[]');
    var precios = document.getElementsByName('precio[]');
    var cantidades = document.getElementsByName('cantidad[]');
    var descuentos = document.getElementsByName('descuento[]');
    var subtotales = document.getElementsByName('subtotal[]');
    var totalVenta = 0;

    for (var i = 0; i < productos.length; i++) {
        var precio = parseFloat(precios[i].value);
        var cantidad = parseInt(cantidades[i].value);
        var descuento = parseFloat(descuentos[i].value);

        if (isNaN(descuento) || descuento < 0 || descuento > 100) {
            alert("El descuento debe estar en el rango de 0% a 100%.");
            descuentos[i].value = '';
            descuento = 0;
        }

        if (cantidad >= 1) {
            var precioConDescuento = precio * (1 - descuento / 100);
            var subtotal = precioConDescuento * cantidad;
        } else {
            var subtotal = 0;
        }

        subtotales[i].value = subtotal.toFixed(0);
        totalVenta += subtotal;
    }

    document.getElementById('totalVenta').value = totalVenta.toFixed(0);
}

function habilitarCantidad(key) {
    var checkbox = document.getElementsByName('seleccionar[]')[key];
    var cantidadInput = document.getElementById('cantidad_' + key);
    var descuentoInput = document.getElementById('descuento_' + key);

    if (checkbox.checked) {
        cantidadInput.disabled = false;
        descuentoInput.disabled = false;
    } else {
        cantidadInput.disabled = true;
        descuentoInput.disabled = true;
        cantidadInput.value = 0;
        descuentoInput.value = 0;
    }

    calcularTotal();
}
/*document.addEventListener('DOMContentLoaded', function() {
    // Verificar si hay datos en sessionStorage para la tabla de productos
    if (sessionStorage.getItem('detpromoData')) {
        var det_promoData = sessionStorage.getItem('detpromoData');
        
        if (det_promoData) {
            var detPromoArray = JSON.parse(det_promoData);
            var promo = detPromoArray[0];
    
            document.getElementById('nombre_prom').value = promo.nom_promo;
            document.getElementById('Idpromo').value = promo.id_promo;
            document.getElementById('Idpromo').disabled = true;
            document.getElementById('doc_hidden').value = promo.id_promo;
            var tablaHTML = '<tr><th scope="col">Producto</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Descuento</th><th scope="col">Subtotal</th></tr>'

            for (var i = 0; i < detPromoArray.length; i++) {
                var producto = detPromoArray[i].nom_prod;
                var precio = detPromoArray[i].pre_prod;
                var cantidad = detPromoArray[i].cantidad;
                var descuento = detPromoArray[i].descuento;
                var subtotal = detPromoArray[i].subtotal;
    
                tablaHTML += '<tr>';
                tablaHTML += '<td><input type="text" name="producto[]" value="' + producto + '" readonly></td>';
                tablaHTML += '<td><input type="text" name="precio[]" value="' + precio + '" readonly></td>';
                tablaHTML += '<td><input type="number" name="cantidad[]" min="1" value="' + cantidad +'" id="cantidad_' + i + '" ></td>';
                tablaHTML += '<td><input type="number" name="descuento[]" min="1" value="'+ descuento +'" id="descuento_' + i + '" ></td>';
                tablaHTML += '<td><input type="text" name="subtotal[]" value="'+ subtotal +'" readonly></td>'; // Campo de subtotal vacío por ahora
                tablaHTML += '</tr>';
            }
    
            tablaHTML += '<tr><td colspan="6">Total Venta: <input type="text" name="totalVenta" id="totalVenta" value="'+ promo.totalpromo +'" readonly></td></tr>';
    
            // Insertamos la tabla en el elemento con id "TablaPromo"
            document.getElementById('TablaPromo').innerHTML = tablaHTML;
            var cantidades = document.getElementsByName('cantidad[]');
            for (var i = 0; i < cantidades.length; i++) {
                cantidades[i].addEventListener('input', calcularTotal);
            }
        
            var descuentos = document.getElementsByName('descuento[]');
            for (var i = 0; i < descuentos.length; i++) {
                descuentos[i].addEventListener('input', calcularTotal);
            }
        
            // Asociar la función habilitarCantidad al evento change de todos los checkboxes de selección
            var checkboxes = document.getElementsByName('seleccionar[]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].addEventListener('change', function() {
                    habilitarCantidad(this.value);
                });
            }
        }
    }
});

function calcularTotal() {
    var subtotales = document.getElementsByName('subtotal[]');
    var totalVenta = 0;

    for (var i = 0; i < subtotales.length; i++) {
        var precio = parseFloat(document.getElementsByName('precio[]')[i].value);
        var cantidad = parseInt(document.getElementsByName('cantidad[]')[i].value);
        var descuento = parseFloat(document.getElementsByName('descuento[]')[i].value);

        if (isNaN(descuento) || descuento < 0 || descuento > 100) {
            alert("El descuento debe estar en el rango de 0% a 100%.");
            descuento = 0;
        }

        if (cantidad >= 1) {
            var precioConDescuento = precio * (1 - descuento / 100);
            var subtotal = precioConDescuento * cantidad;
        } else {
            var subtotal = 0;
        }

        subtotales[i].value = subtotal.toFixed(0);
        totalVenta += subtotal;
    }

    document.getElementById('totalVenta').value = totalVenta.toFixed(0);
}

function habilitarCantidad(key) {
    var checkbox = document.getElementsByName('seleccionar[]')[key];
    var cantidadInput = document.getElementById('cantidad_' + key);
    var descuentoInput = document.getElementById('descuento_' + key);

    if (checkbox.checked) {
        cantidadInput.disabled = false;
        descuentoInput.disabled = false;
    } else {
        cantidadInput.disabled = true;
        descuentoInput.disabled = true;
        cantidadInput.value = 0;
        descuentoInput.value = 0;
    }

    calcularTotal();
}*/