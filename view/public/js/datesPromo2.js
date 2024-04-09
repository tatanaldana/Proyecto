document.addEventListener('DOMContentLoaded', function() {
    // Verificamos que en la sesión del navegador exista el elemento llamado 'det_promoData'
    var det_promoData = sessionStorage.getItem('detpromoData');

    // Si el 'det_promoData' existe, entonces convertimos el JSON almacenado en un array
    if (det_promoData) {
        var detPromoArray = JSON.parse(det_promoData); // este es el array
        var promo = detPromoArray[0];
    
        document.getElementById('nombre_prom').value = promo.nom_promo;
        document.getElementById('Idpromo').value = promo.id_promo;
        document.getElementById('Idpromo').disabled = true;
        document.getElementById('nombre_prom').disabled = true;
        // Obtenemos los productos y precios del array
        var tablaHTML = '<tr><th scope="col">Producto</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">Descuento</th><th scope="col">Subtotal</th></tr>';

        // Construimos las filas de la tabla dinámicamente
        for (var i = 0; i < detPromoArray.length; i++) {
            var producto = detPromoArray[i].nom_prod;
            var precio = detPromoArray[i].pre_prod;
            var cantidad = detPromoArray[i].cantidad;
            var descuento = detPromoArray[i].descuento;
            var subtotal=detPromoArray[i].subtotal;

            tablaHTML += '<tr>';
            tablaHTML += '<td><input type="text" name="producto[]" value="' + producto + '" disabled readonly></td>';
            tablaHTML += '<td><input type="text" name="precio[]" value="' + precio + '" disabled readonly></td>';
            tablaHTML += '<td><input type="number" name="cantidad[]" min="1" value="' + cantidad +'" id="cantidad_' + i + '" disabled></td>';
            tablaHTML += '<td><input type="number" name="descuento[]" min="1" value="'+ descuento +'" id="descuento_' + i + '" disabled></td>';
            tablaHTML += '<td><input type="text" name="subtotal[]" value="'+ subtotal +'" disabled readonly></td>'; // Campo de subtotal vacío por ahora
            tablaHTML += '</tr>';
        }

        tablaHTML += '<tr><td colspan="6">Total Venta: <input type="text" name="totalVenta" id="totalVenta" value="'+ promo.totalpromo +'" readonly></td></tr>';

        // Insertamos la tabla en el elemento con id "TablaPromo"
        document.getElementById('TablaPromo').innerHTML = tablaHTML;
    }

});

// Función para calcular y actualizar los valores de subtotal y total
