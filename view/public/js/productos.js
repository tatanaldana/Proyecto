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




// agregar maprima.php

$(document).ready(function() {
$('#btn_agregar_prod').click(function(e) {
  e.preventDefault(); // Previene el comportamiento predeterminado del envío del formulario

  var formData = $('#agregar_producto').serialize(); // Serializa los datos del formulario

  // Realiza la solicitud AJAX
  $.ajax({
      method: 'POST',
      url: '../../../../controller/productos/agregarProducto.php',
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
              //window.location.href = '../../forms/productos_adm.php';
          }
      },
      error: function(xhr, status, error) {
          console.error('Error en la solicitud AJAX:', status, error);
      }
  });
});
});



//editarcategoria.php

$('#editButton').click(function() {
// Cuando se da click en el boton con el id EditButton, se recupera el valor idproducto del checkbox seleccionado
var editar = $('input:checkbox:checked').data('idproducto');
// Se realiza la petición AJAX por método POST
$.ajax({
  method: 'POST',
  url: '../../../controller/productos/viewProducto.php',
  // Se envía el dato 'idproducto' al controlador PHP
  data: { idproducto:editar },
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
<<<<<<< Updated upstream
      //swal('Exitoso', 'Campos obligatorios,no se ha modificado la materia prima', 'success');
      window.location.href = '../ma_prima.php';
=======
      swal('Exitoso', 'Campos obligatorios,no se ha modificado la materia prima', 'success');
      window.location.href = '../productos_adm.php';
>>>>>>> Stashed changes

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
var maprimaData = sessionStorage.getItem('maprimaData');

//Si maprimaData' existe, entonces convertimos el JSON almacenado en un array
if (maprimaData) {
var maprimaArray= JSON.parse(maprimaData);//este es el array
//Obtenemos el primer objeto del array y lo asigna a la variable 'maprima'
var maprima = maprimaArray[0];
console.log(maprima);
//creamos la funcion para poder llenar los campos del formulario
function asignarvalores(){
//se llenan los campos de acuerdo al id de cada uno en el formulario
document.getElementById('cod_materia_pri').value = maprima.cod_materia_pri;
document.getElementById('referencia').value = maprima.referencia;
document.getElementById('descripcion').value = maprima.descripcion;
document.getElementById('existencia').value = maprima.existencia;
document.getElementById('entrada').value = maprima.entrada;
document.getElementById('salida').value = maprima.salida;
document.getElementById('stock').value = maprima.stock;
document.getElementById('doc_hidden').value = maprima.cod_materia_pri;
}
//Llamamos la función para que se ejecute
asignarvalores();

//Luego deshabilitamos los campos que no vamos a modificar
<<<<<<< Updated upstream
document.getElementById('cod_materia_pri').disabled = true;
//Eliminamos el elemento 'maprimaData' de la sesion de almacenamiento.
sessionStorage.removeItem('maprimaData');
=======
document.getElementById('idProducto').disabled = true;
//Eliminamos el elemento 'producto data ' de la sesion de almacenamiento.
sessionStorage.removeItem('productoData');
>>>>>>> Stashed changes

//si no se encuentra 'MAPRIMAData' entonces imprime el mensaje

} else {
console.log("No se han encontrado datos de la materia prima");
}
});



//eliminarcategorias.php

$(document).ready(function() {
$('#deleteButton').click(function() {
  // Obtener el cod materia prima del checkbox marcado
  var cod_materia_pri = $('input:checkbox:checked').data('cod_materia_pri');

  // Verificar si se seleccionó alguna materia prima
  if (cod_materia_pri) {
      console.log('ID de materia prima  a eliminar:', cod_materia_pri);

      // Realizar la solicitud AJAX para eliminar la materia prima 
      $.ajax({
          method: 'POST',
          url: '../../../controller/maPrima/eliminarMaprima.php',
          data: { cod_materia_pri: cod_materia_pri },
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
                  window.location.href = '../../administrador/forms/ma_prima.php';
                  // Puedes realizar cualquier acción adicional necesaria, como actualizar la interfaz de usuario
                  //../../administrador/forms/ma_prima.php'; ruta despues de cambiar la carpeta a a forms
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
});




//view MAPRIMA 

$('#viewButton').click(function() {
//Cuando se da click en el boton con el id viewButton , se recupera el valor cod_materia_pri del checkbox seleccionado
    var view_materia_pri = $('input:checkbox:checked').data('cod_materia_pri');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
<<<<<<< Updated upstream
      url: '../../../controller/maPrima/viewMaprima.php',
      //Se envía el dato 'cod_materia_pri' al controlador PHP
      data: { cod_materia_pri: view_materia_pri},
=======
      url: '../../../controller/productos/viewProducto.php',
      //Se envía el dato 'id producto' al controlador PHP
      data: {idProducto: view_producto},
>>>>>>> Stashed changes
      //Si la solicitud es exitosa
      success: function(response) {
        try {

        //Se analiza la respuesta JSON obtenida del controlador y con la función json.parse convertimos 
        //la cadena de texto JSON a un objeto javascript
          var view_materia_pri = JSON.parse(response);
          if (!view_materia_pri.error) {
            //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
            //convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
            sessionStorage.setItem('viewData', JSON.stringify(view_materia_pri));
            //Se redirecciona al formulario de view luego de un segundo
            setTimeout(function() {
              window.location.href = '../forms/maPrima/form_view.php';
            }, 1000);
          } else {
            console.log(view_materia_pri.error);
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
document.getElementById('cod_materia_pri').value = viewData.cod_materia_pri;
document.getElementById('referencia').value = viewData.referencia;
document.getElementById('descripcion').value = viewData.descripcion;
document.getElementById('existencia').value = viewData.existencia;
document.getElementById('entrada').value = viewData.entrada;
document.getElementById('salida').value = viewData.salida;
document.getElementById('stock').value = viewData.stock;

}
//Llamamos la función para que se ejecute
asignarvalores2();
//Eliminamos el elemento 'viewData' de la sesion de almacenamiento.
sessionStorage.removeItem('viewData');
//Luego deshabilitamos los campos que no vamos a modificar
document.getElementById('cod_materia_pri').disabled = true;
document.getElementById('referencia').disabled = true;
document.getElementById('descripcion').disabled = true;
document.getElementById('existencia').disabled = true;
document.getElementById('entrada').disabled = true;
document.getElementById('salida').disabled = true;
document.getElementById('stock').disabled = true;
//si no se encuentra 'viewData' entonces imprime el mensaje

} else {
console.log("No se han encontrado datos de la materia prima");
}
});





/* todomat_prima.php*/
//Mostrar registros existentes apenas ingresa a la pagina categorias.


$(document).ready(function() {
//Se verifica que la ruta del archivo termine en ma_prima.php para ejecutar la solicitud AJAX
if (window.location.pathname.endsWith("ma_prima.php")) {
//Se realiza la solicitud AJAX al cargar la página
$.ajax({
  method: 'POST',
  url: '../../../controller/maPrima/todoMaprima.php',
  success: function(response) {
    var datos = JSON.parse(response);
    var tablaHTML = '';
    for (var i = 0; i < datos.length; i++) {
      tablaHTML += '<tr>';
      tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-cod_materia_pri="' + datos[i].cod_materia_pri + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
      tablaHTML += '<td>' + datos[i].cod_materia_pri + '</td>';
      tablaHTML += '<td>' + datos[i].referencia + '</td>';
      tablaHTML += '<td>' + datos[i].descripcion + '</td>';
      tablaHTML += '<td>' + datos[i].existencia + '</td>';
      tablaHTML += '<td>' + datos[i].entrada + '</td>';
      tablaHTML += '<td>' + datos[i].salida + '</td>';
      tablaHTML += '<td>' + datos[i].stock + '</td>';
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
