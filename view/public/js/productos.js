function mostrarProductos(productos, idCategoria) {
    console.log('ID de categoría:', idCategoria);
    console.log('Productos:', productos);
    var contenedorProductos = $('#listado-productos');
    var contenedorTitulo = $('#titulo-producto');
  
    // Limpiar el contenido existente en el contenedor
    contenedorProductos.empty();
    contenedorTitulo.empty();
  
    if (Array.isArray(productos) && productos.length > 0) {
      contenedorTitulo.append(`<div class="imagenindex"><h1>${productos[0].nombre_cat}</h1></div>`);
  
      productos.forEach(function(producto) {
        var productoHTML = `
            <div class="contenedor_productos row categoria" data-id_categoria="${producto.id_categoria}">
                <form method="POST" action="../productos/carrito.php?accion=agregar&cod=${producto.cod}">
                    <div>
                        <div class="d-flex flex-column align-items-center">
                            <img src="../../public/img/categorias/cat pollo.jpg" alt="${producto.nombre_pro}">
                            <div style="padding-top:20px;font-size:18px;">${producto.nombre_pro}</div>
                            <div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre_pro"]; ?></div>
                            <div style="padding-top:10px;font-size:20px;"><?php echo "$" . $productos_array[$i]["precio_pro"]; ?></div>
                            <div class="d-flex flex-column align-items-center">
                                <input type="number" name="txtcantidad" value="1" size="1" class="mb-2" />
                                <input type="submit" value="Agregar" style="background: var(--primario); color: white; border:none; padding:10px; width:100%;" />
                                <div class="contenido">${producto.detalle}</div>
                                <div class="precio">$${producto.precio_pro}</div>      
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        `;
  
        contenedorProductos.append(productoHTML);
    });
  
    } else {
      
      
      console.error("La respuesta no es un array o está vacía:", productos);
    }
  }