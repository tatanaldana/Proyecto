//Muestra las Categorias

$(document).ready(function() {
    // Supongamos que las categorías se obtienen de alguna manera
    var categorias = obtenerCategorias();
  
    // Llamada a la función en usuario.js
    mostrarCategorias(categorias);
  
    // Agregar evento de clic a las categorías
    $('.categoria').on('click', function(event) {
      event.preventDefault();  // Previene el comportamiento predeterminado del enlace
      var idCategoria = $(this).data('id_categoria');
      
      // Redirige a la página de productos
      window.location.href = "../../user/productos/productos.php?idCategoria=" + idCategoria;
    });
  });
  
  
  function obtenerCategorias() {
    var categorias;
  
    // Realizar la solicitud AJAX para obtener las categorías
    $.ajax({
      method: 'POST',
      url: '../../../controller/categorias/todoCategorias.php',
      async: false,  // Configurado para que la llamada sea síncrona
      success: function(response) {
        try {
          categorias = JSON.parse(response);
        } catch (error) {
          console.error("Error al parsear la respuesta JSON:", error);
        }
      },
      error: function(error) {
        console.error("Error al obtener categorías:", error);
      }
    });
  
    return categorias || [];
  }
  
  function mostrarCategorias(categorias) {
    // Obtener el contenedor donde se mostrarán las categorías
    var listadoCategorias = $('#listado-categorias');
  
    // Limpiar el contenido existente en el contenedor
    listadoCategorias.empty();
  
    // Verificar si categorias es un array antes de intentar iterar sobre él
    if (Array.isArray(categorias)) {
      // Iterar sobre las categorías y agregarlas al contenedor
      categorias.forEach(function(categoria) {
        var categoriaHTML = `
          <div class="categoria" data-id_categoria="${categoria.id_categoria}">
            <img src="../../public/img/categorias/${categoria.nombre_cat}.jpg" alt="${categoria.nombre_cat}">
            <a href="../../user/productos/productos.php?idCategoria=${categoria.id_categoria}" >${categoria.nombre_cat}</a>
          </div>
        `;
  
        // Agregar la categoría al contenedor
        listadoCategorias.append(categoriaHTML);
      });
    } else {  
      // Si categorias no es un array, muestra un mensaje de error
      console.error("La respuesta no es un array:", categorias);
      // Puedes agregar un mensaje o realizar alguna acción en caso de error
    }
  }
  
  
  //Muestra los productos de la Categoria
  
  $(document).ready(function() {
    // Extraer el ID de la categoría de la URL
    var idCategoria = new URLSearchParams(window.location.search).get('idCategoria');
  
    // Llamar a la función para cargar productos
    cargarProductosDeCategoria(idCategoria);
  });
  
  
  function cargarProductosDeCategoria(idCategoria) {
    if (idCategoria !== null) {
      console.log('Antes de la llamada AJAX');
      $.ajax({
        method: 'GET',
        url: '../../../controller/productos/todoProductos.php?idCategoria=' + idCategoria,
        success: function(response) {
          console.log('Tipo de datos de la respuesta:', typeof response);
          console.log('Respuesta del servidor:', response);
          try {
            var data;
  
            // Si la respuesta ya es un objeto, úsala directamente
            if (typeof response === 'object') {
              data = response;
            } else {
              // Intenta parsear la respuesta como JSON
              data = JSON.parse(response);
            }
  
            // Verifica si es un array antes de llamar a mostrarProductos
            if (Array.isArray(data)) {
              // Llama a la función para mostrar los productos y pasa el id de la categoría
              mostrarProductos(data, idCategoria);
            } else {
              console.error('La respuesta del servidor no es un array:', data);
            }
          } catch (error) {
            console.error('Error al procesar la respuesta:', error);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.error('Error al cargar productos:', textStatus, errorThrown, jqXHR);
          // Puedes agregar un mensaje o realizar alguna acción en caso de error
        }
      });
    } else {
      console.error('ID de categoría no definido');
    }
  }
  
  
  function mostrarProductos(productos, idCategoria) {
    console.log('ID de categoría:', idCategoria);
    console.log('Productos:', productos);
    var contenedorProductos = $('#listado-productos');
    var contenedorTitulo = $('#titulo-producto');
  
    // Limpiar el contenido existente en el contenedor
    contenedorProductos.empty();
    contenedorTitulo.empty();
  
    if (Array.isArray(productos) && productos.length > 0) {
      contenedorTitulo.append(`<div class="imagenindex"><h1>${productos[0].nombre_ca}</h1></div>`);
  
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
  