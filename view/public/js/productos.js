<<<<<<< Updated upstream
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
=======
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
>>>>>>> Stashed changes


//ok ok ok ok ok ok
  //Funcion para ejecutar la barra de busqueda cuando se haga click en el boton btnbuscar
  $('#btnbuscar').click(function() {
    var buscar = $('#buscar').val();
//Se realiza la solicitud AJAX para buscar según el valor ingresado
    $.ajax({
        method: 'POST',
        url: '../../../controller/productos/mostrarProducto.php',
        //se envia el valor del campo al controlador
        data: { buscar_php: buscar },
        success: function(response) {
            var datos = JSON.parse(response);
            var tablaHTML = '';
//Se genera el HTML para visualizar el resultado de la busqueda en la tabla
            for (var i = 0; i < datos.length; i++) {
                tablaHTML += '<tr>';
                tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-idProducto="' + datos[i].idProducto + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
                tablaHTML += '<td>' + datos[i].idProducto+ '</td>';
                tablaHTML += '<td>' + datos[i].nombre_pro + '</td>';
                tablaHTML += '<td>' + datos[i].detalle + '</td>';
                tablaHTML += '<td>' + datos[i].precio_pro + '</td>';
                tablaHTML += '<td>' + datos[i].categorias_idcategoria + '</td>';
                tablaHTML += '<td>' + datos[i].foto + '</td>';
                tablaHTML += '<td>' + datos[i].cod + '</td>';
                tablaHTML += '</tr>';
            }
// se inserta el HTML generado en tbody de la tabla
            $('#filasTabla').html(tablaHTML);
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
});




// agregar producto.php

$(document).ready(function() {
$('#btn_agregar_prod').click(function(e) {
  e.preventDefault(); // Previene el comportamiento predeterminado del envío del formulario

  var formData = $('#agregar_producto').serialize(); // Serializa los datos del formulario

  // Realiza la solicitud AJAX
  $.ajax({
      method: 'POST',
      url: '../../../../controller/productos/agregarProducto1.php',
      data: formData,
      beforeSend: function() {
          $('#load').show(); // Mostrar un indicador de carga si es necesario
      },
      success: function(response) {
          $('#load').hide(); // Ocultar el indicador de carga

          if (response === 'error_1') {
              swal('Error', 'Campo obligatorio, ', 'warning');
          } else {
              // Redirigir a otra página o realizar otra acción después de agregar la categoría
          window.location.href = '../../forms/productos_adm.php';
          }
      },
      error: function(xhr, status, error) {
          console.error('Error en la solicitud AJAX:', status, error);
      }
  });
});
});


//ok ok ok ok ok
//editarproducto.php

$('#editButton').click(function() {
// Cuando se da click en el boton con el id EditButton, se recupera el valor idproducto del checkbox seleccionado
var editar_producto = $('input:checkbox:checked').data('idproducto');
// Se realiza la petición AJAX por método POST
$.ajax({
  method: 'POST',
  url: '../../../controller/productos/viewProducto.php',
  // Se envía el dato 'idproducto' al controlador PHP
  data: { idProducto:editar_producto },
  // Si la solicitud es exitosa
  success: function(response) {
      try {
          // Se analiza la respuesta JSON obtenida del controlador y con la función JSON.parse convertimos la cadena de texto JSON a un objeto javascript
          var productoData = JSON.parse(response);
          if (!productoData.error) {
              // Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
              // convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
              sessionStorage.setItem('productoData', JSON.stringify(productoData));
              // Se redirecciona al formulario de edicion luego de un segundo
              setTimeout(function() {
                  window.location.href = '../forms/productos/form_editar.php';
                  
              }, 1000);
          } else {
              console.log(productoData.error);
          }
      } catch (error) {
          console.error('Error al analizar la respuesta JSON:', error);
      }
  },
  error: function(xhr) {
      console.error(xhr.responseText);
  }
});
});



//ok ok ok ok 
//Datos para realizar update del registro

$('#btnmodificar').click(function() {
var editar_prod = $('#editar_prod').serialize();
console.log (editar_prod);
$.ajax({
  method: 'POST',
  url: '../../../../controller/productos/editarProducto.php',
  data: editar_prod,
  beforeSend: function() {
    $('#load').show();
  },
  success: function(response) {
    $('#load').hide();

    if (response == 'error_1') {
      swal('Error', 'Campos obligatorios,no se ha modificado la materia prima', 'warning');
    } else {

      swal('Exitoso', 'se ha modificado el producto', 'success');
      window.location.href = '../productos_adm.php';


    }
  },
  error: function(xhr) {
    console.error(xhr.responseText);
  }
});
});


//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
document.addEventListener('DOMContentLoaded', function() {
//Verificamos que en la asesión del navegador exista el elemento llamado 'MAPRIMAData'
var productoData = sessionStorage.getItem('productoData');

//Si maprimaData' existe, entonces convertimos el JSON almacenado en un array
if (productoData) {
var productoArray= JSON.parse(productoData);//este es el array
//Obtenemos el primer objeto del array y lo asigna a la variable 'maprima'
var producto = productoArray[0];
console.log(producto);
//creamos la funcion para poder llenar los campos del formulario
function asignarvalores(){
//se llenan los campos de acuerdo al id de cada uno en el formulario
document.getElementById('idProducto').value = producto.idProducto;
document.getElementById('nombre_pro').value = producto.nombre_pro;
document.getElementById('detalle').value =producto.detalle;
document.getElementById('precio_pro').value = producto.precio_pro;
document.getElementById('categorias_idcategoria').value = producto.categorias_idcategoria;
document.getElementById('img').value = producto.img;
document.getElementById('cod').value = producto.cod;
document.getElementById('doc_hidden').value = producto.idProducto;
}
//Llamamos la función para que se ejecute
asignarvalores();

//Luego deshabilitamos los campos que no vamos a modificar
document.getElementById('idProducto').disabled = true;
//Eliminamos el elemento 'producto data ' de la sesion de almacenamiento.
sessionStorage.removeItem('productoData');

//si no se encuentra 'MAPRIMAData' entonces imprime el mensaje

} else {
console.log("No se han encontrado datos del producto");
}
});


//ok ok ok ok ok ok
//eliminar producto .php

$('#deleteButton').click(function() {
  // Obtener el cod materia prima del checkbox marcado
  var idproducto = $('input:checkbox:checked').data('idproducto');

  // Verificar si se seleccionó alguna materia prima
  if (idproducto) {
      console.log('ID de produto a eliminar:', idproducto);

      // Realizar la solicitud AJAX para eliminar la materia prima 
      $.ajax({
          method: 'POST',
          url: '../../../controller/productos/eliminarProducto.php',
          data: { idproducto: idproducto },
          beforeSend: function() {
              // Mostrar un indicador de carga mientras se procesa la solicitud
              $('#load').show();
          },
          success: function(res) {
              // Ocultar el indicador de carga después de completar la solicitud
              $('#load').hide();
              response=JSON.parse(res);
              // Verificar la respuesta del servidor
              if (response.success) {
                  
                  // La categoría se eliminó correctamente
                  alert(response.message);
                  // Puedes realizar cualquier acción adicional necesaria, como actualizar la interfaz de usuario
                 window.location.href = '../../administrador/forms/productos_adm.php';
                 
              } else {
                  // Ocurrió un error o la materia prima no se pudo eliminar
                  // Mostrar un mensaje de error o manejar el caso según sea necesario
                  alert('Ocurrió un error al eliminar la materia prima');
              }
          },
          error: function(xhr) {
              // Manejar errores de la solicitud AJAX
              console.error('Error en la solicitud AJAX:', xhr.responseText);
              alert('Ocurrió un error en la solicitud AJAX');
          }
      });
  } else {
      // No se seleccionó ninguna categoría, mostrar un mensaje de advertencia
      alert('Por favor, selecciona una mataria prima para eliminar');
  }
});



//ok ok ok ok ok 
//view MAPRIMA 

$('#viewButton').click(function() {
//Cuando se da click en el boton con el id viewButton , se recupera el valor cod_materia_pri del checkbox seleccionado
    var view_producto = $('input:checkbox:checked').data('idproducto');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
      url:'../../../controller/productos/viewProducto.php',
      //Se envía el dato 'id producto' al controlador PHP
      data: {idProducto: view_producto},
      

      //Si la solicitud es exitosa
      success: function(response) {
        try {

        //Se analiza la respuesta JSON obtenida del controlador y con la función json.parse convertimos 
        //la cadena de texto JSON a un objeto javascript
          var view_producto = JSON.parse(response);
          if (!view_producto.error) {
            //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
            //convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
            sessionStorage.setItem('productoData', JSON.stringify(view_producto));
            //Se redirecciona al formulario de view luego de un segundo
            setTimeout(function() {
              window.location.href = '../forms/productos/form_view.php';
            }, 1000);
          } else {
            console.log(view_producto.error);
          }
        } catch (error) {
          console.error('Error al analizar la respuesta JSON:', error);
        }
      },
      error: function(xhr) {
        console.error(xhr.responseText);
      }
    });
  });
//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
document.addEventListener('DOMContentLoaded', function() {
//Verificamos que en la asesión del navegador exista el elemento llamado 'viewData'
var viewData = sessionStorage.getItem('viewData');

//Si el 'viewData' existe, entonces convertimos el JSON almacenado en un array
if (viewData) {
var viewArray= JSON.parse(viewData);//este es el array
//Obtenemos el primer objeto del array y lo asigna a la variable 'viewdata'
var viewData = viewArray[0];
console.log(viewData);
//creamos la funcion para poder llenar los campos del formulario
function asignarvalores2(){
//se llenan los campos de acuerdo al id de cada uno en el formulario
document.getElementById('idProducto').value = viewData.idProducto;
document.getElementById('nombre_pro').value = viewData.nombre_pro;
document.getElementById('detalle').value = viewData.detalle;
document.getElementById('precio_pro').value = viewData.precio_pro;
document.getElementById('categorias_idcategoria').value = viewData.categorias_idcategoria;
document.getElementById('img').value = viewData.img;
document.getElementById('cod').value = viewData.cod;

}
//Llamamos la función para que se ejecute
asignarvalores2();
//Eliminamos el elemento 'viewData' de la sesion de almacenamiento.
sessionStorage.removeItem('viewData');
//Luego deshabilitamos los campos que no vamos a modificar

document.getElementById('idProducto').disabled = true;
document.getElementById('nombre_pro').disabled = true;
document.getElementById('detalle').disabled = true;
document.getElementById('precio_pro').disabled = true;
document.getElementById('categorias_idcategoria').disabled = true;
document.getElementById('img').disabled = true;
document.getElementById('cod').disabled = true;
//si no se encuentra 'viewData' entonces imprime el mensaje

} else {
console.log("No se han encontrado datos del producto");
}
});




//ok ok ok ok
/* todoproducto.php*/
//Mostrar registros existentes apenas ingresa a la pagina categorias.


$(document).ready(function() {
//Se verifica que la ruta del archivo termine en ma_prima.php para ejecutar la solicitud AJAX
if (window.location.pathname.endsWith("productos_adm.php")) {
//Se realiza la solicitud AJAX al cargar la página
$.ajax({
  method: 'POST',
  url: '../../../controller/productos/todoProductos1.php',
  success: function(response) {
    var datos = JSON.parse(response);
    var tablaHTML = '';
    for (var i = 0; i < datos.length; i++) {
      tablaHTML += '<tr>';
      tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-idProducto="' + datos[i].idProducto + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
      tablaHTML += '<td>' + datos[i].idProducto + '</td>';
      tablaHTML += '<td>' + datos[i].nombre_pro + '</td>';
      tablaHTML += '<td>' + datos[i].detalle + '</td>';
      tablaHTML += '<td>' + datos[i].precio_pro + '</td>';
      tablaHTML += '<td>' + datos[i].categorias_idcategoria + '</td>';
      tablaHTML += '<td>' + datos[i].foto + '</td>';
      tablaHTML += '<td>' + datos[i].cod + '</td>';
      tablaHTML += '</tr>';
  }

    $('#filasTabla').html(tablaHTML);
},
error: function(xhr) {
  console.error(xhr.responseText);
}
});
}
});
