

//ok ok ok 
  //Funcion para ejecutar la barra de busqueda cuando se haga click en el boton btnbuscar
  $('#btnbuscar').click(function() {
    var buscar = $('#buscar').val();
//Se realiza la solicitud AJAX para buscar según el valor ingresado
    $.ajax({
        method: 'POST',
        url: '../../../controller/promociones/mostrarPromociones.php',
        //se envia el valor del campo al controlador
        data: { buscar_php: buscar },
        success: function(response) {
            var datos = JSON.parse(response);
            var tablaHTML = '';
//Se genera el HTML para visualizar el resultado de la busqueda en la tabla
            for (var i = 0; i < datos.length; i++) {
                tablaHTML += '<tr>';
                tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-id_promo="' + datos[i].id_promo + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
                tablaHTML += '<td>' + datos[i].id_promo+ '</td>';
                tablaHTML += '<td>' + datos[i].nom_promo + '</td>';
                tablaHTML += '<td>' + datos[i].totalpromo + '</td>';
                tablaHTML += '<td>' + datos[i].categorias_idcategoria + '</td>';
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

$('#addButton').click(function(e) {
  e.preventDefault(); // Previene el comportamiento predeterminado del envío del formulario

  $.ajax({
    url: '../../../controller/productos/productosController.php',
    method: 'get',
    datatype: 'json',
    success: function(response) {
        try {
            // Se analiza la respuesta JSON obtenida del controlador
            var productosData = JSON.parse(response);
            if (!productosData.error) {
                // Si no hay errores en la respuesta, almacenamos los datos en sessionStorage
                sessionStorage.setItem('PromoData', JSON.stringify(productosData));
                // Redireccionamos al formulario de venta después de completar ambas solicitudes AJAX
                window.location.href = '../forms/promociones/form_registro.php';
            } else {
                // Si hay un error en la respuesta, mostramos un mensaje de alerta
                console.log(productosData.error);
                alert("Productos no registrados. Por favor genere el registro en el sistema");
                window.location.href = '../administrador/forms/productos/form_registro.php';
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

// agregar maprima.php

$(document).ready(function() {
  $('#btnCalcular').click(function(e) {
    e.preventDefault(); // Previene el comportamiento predeterminado del envío del formulario

    var formData = $('#agregar_promocion').serialize(); // Serializa los datos del formulario

    // Realiza la solicitud AJAX
    $.ajax({
      method: 'POST',
      url: '../../../../controller/promociones/agregarPromociones.php',
      data: formData,
      dataType: 'json',
      beforeSend: function() {
        $('#load').show(); // Mostrar un indicador de carga si es necesario
      },
      success: function(response) {
        $('#load').hide(); // Ocultar el indicador de carga
      console.log(response);
        // Verificar si la respuesta contiene un mensaje de éxito
        if (response.success) {
          swal({
            title: 'Éxito',
            text: response.success,
            icon: 'success',
            buttons: {
              confirm: 'Aceptar',
            },
            dangerMode: false,
          }).then((willConfirm) => {
            if (willConfirm) {
              window.location.href = '../../forms/promociones.php'; // Recargar la página para reflejar los cambios
            }
          });
          console.log(response.error);
        } else if (response.error) {
          // Si la respuesta contiene un mensaje de error, mostrar el mensaje de error
          swal('Error', response.error, 'warning');
          console.log("Error encontrado:", response.error);
        } else {
          // Si la respuesta no contiene ni éxito ni error, mostrar un mensaje de error genérico
          swal('Error', 'No se pudo procesar la solicitud', 'warning');
          console.log("Error encontrado:", response.error);
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
        // Mostrar un mensaje de error en caso de que ocurra un error en la solicitud AJAX
        swal('Error', 'Ocurrió un error en la solicitud AJAX', 'error');
      }
    });
  });
});



//editarpromociones.php

$('#editButton').click(function() {

  $.ajax({
    url: '../../../controller/productos/productosController.php',
    method: 'get',
    datatype: 'json',
    success: function(response) {
        try {
            // Se analiza la respuesta JSON obtenida del controlador
            var productosData = JSON.parse(response);
     
            if (!productosData.error) {
                // Si no hay errores en la respuesta, almacenamos los datos en sessionStorage
                sessionStorage.setItem('PromoData', JSON.stringify(productosData));
                // Redireccionamos al formulario de venta después de completar ambas solicitudes AJAX
                window.location.href = '../forms/promociones/form_editar.php';
            } else {
                // Si hay un error en la respuesta, mostramos un mensaje de alerta
                console.log(productosData.error);
                alert("Productos no registrados. Por favor genere el registro en el sistema");
                window.location.href = '../administrador/forms/productos/form_registro.php';
            }
        } catch (error) {
            console.error('Error al analizar la respuesta JSON:', error);
        }
    },
    error: function(xhr) {
        console.error(xhr.responseText);
    }
});
// Cuando se da click en el boton con el id EditButton, se recupera el valor id_promo del checkbox seleccionado
var editar = $('input:checkbox:checked').data('id_promo');
// Se realiza la petición AJAX por método POST
$.ajax({
  method: 'POST',
  url: '../../../controller/promociones/viewPromociones.php',
  // Se envía el dato 'id_promo' al controlador PHP
  data: { id_promo:editar },
  // Si la solicitud es exitosa
  success: function(response) {
      try {
          // Se analiza la respuesta JSON obtenida del controlador y con la función JSON.parse convertimos la cadena de texto JSON a un objeto javascript
          var detpromoData = JSON.parse(response);
          console.log(detpromoData);
          if (!detpromoData.error) {
              // Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
              // convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
              sessionStorage.setItem('detpromoData', JSON.stringify(detpromoData));
              // Se redirecciona al formulario de edicion luego de un segundo
          } else {
              console.log(detpromoData.error);
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
  // Cuando se da click en el boton con el id EditButton, se recupera el valor id_promo del checkbox seleccionado
  var formData = $('#editarpromo').serialize(); // Serializa los datos del formulario

  // Realiza la solicitud AJAX
  $.ajax({
    method: 'POST',
    url: '../../../../controller/promociones/editarPromociones.php',
    data: formData,
      dataType: 'json',
      beforeSend: function() {
        $('#load').show(); // Mostrar un indicador de carga si es necesario
      },
      success: function(response) {
        $('#load').hide(); // Ocultar el indicador de carga
      console.log(response);
        // Verificar si la respuesta contiene un mensaje de éxito
        if (response.success) {
          swal({
            title: 'Éxito',
            text: response.success,
            icon: 'success',
            buttons: {
              confirm: 'Aceptar',
            },
            dangerMode: false,
          }).then((willConfirm) => {
            if (willConfirm) {
              window.location.href = '../../forms/promociones.php'; // Recargar la página para reflejar los cambios
            }
          });
          console.log(response.error);
        } else if (response.error) {
          // Si la respuesta contiene un mensaje de error, mostrar el mensaje de error
          swal('Error', response.error, 'warning');
          console.log("Error encontrado:", response.error);
        } else {
          // Si la respuesta no contiene ni éxito ni error, mostrar un mensaje de error genérico
          swal('Error', 'No se pudo procesar la solicitud', 'warning');
          console.log("Error encontrado:", response.error);
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
        // Mostrar un mensaje de error en caso de que ocurra un error en la solicitud AJAX
        swal('Error', 'Ocurrió un error en la solicitud AJAX', 'error');
      }
    });
  });




//eliminar promociones.php


$('#deleteButton').click(function() {
  swal({
      title: "¿Estás seguro?",
      text: "¿Realmente quieres eliminar el registro del cliente?",
      icon: "warning",
      buttons: {
          cancel: "Cancelar",
          confirm: "Aceptar",
      },
      dangerMode: true,
  }).then((willDelete) => {
      if (willDelete) {
          // Obtener el id_promo del checkbox marcado
          var id_promo = $('input:checkbox:checked').data('id_promo');

          // Verificar si se seleccionó alguna materia prima
          if (id_promo) {
              console.log('ID de promoción a eliminar:', id_promo);

              // Realizar la solicitud AJAX para eliminar la promoción 
              $.ajax({
                  method: 'POST',
                  url: '../../../controller/promociones/eliminarPromociones.php',
                  data: { id_promo: id_promo },
                  beforeSend: function() {
                      // Mostrar un indicador de carga mientras se procesa la solicitud
                      $('#load').show();
                  },
                  success: function(res) {
                      // Ocultar el indicador de carga después de completar la solicitud
                      $('#load').hide();
                      var response = JSON.parse(res);
                      // Verificar la respuesta del servidor
                      if (response.success) {
                          swal({
                              title: "Éxito",
                              text: "Promoción eliminada exitosamente",
                              icon: "success",
                              buttons: {
                                  confirm: "Aceptar",
                              },
                              dangerMode: false,
                          }).then((willConfirm) => {
                              if (willConfirm) {
                                  window.location.reload(); // Recargar la página para reflejar los cambios
                              }
                          });

                      } else {
                          // Ocurrió un error o la promoción no se pudo eliminar
                          // Mostrar un mensaje de error
                          swal("Error", "Ocurrió un error al eliminar la promoción", "error");
                      }
                  },
                  error: function(xhr) {
                      // Manejar errores de la solicitud AJAX
                      console.error('Error en la solicitud AJAX:', xhr.responseText);
                      swal("Error", "Ocurrió un error en la solicitud AJAX", "error");
                  }
              });
          } else {
              // No se seleccionó ninguna promoción
              swal("Advertencia", "Por favor, selecciona una promoción para eliminar", "warning");
          }
      }
  });
});



//view MAPRIMA 

$('#viewButton').click(function() {
//Cuando se da click en el boton con el id viewButton , se recupera el valor id_promo del checkbox seleccionado
    var viewid_promo = $('input:checkbox:checked').data('id_promo');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
      url: '../../../controller/promociones/viewPromociones.php',
      //Se envía el dato 'id_promo' al controlador PHP
      data: { id_promo: viewid_promo},
      //Si la solicitud es exitosa
      success: function(response) {
        try {

        //Se analiza la respuesta JSON obtenida del controlador y con la función json.parse convertimos 
        //la cadena de texto JSON a un objeto javascript
          var viewid_promo = JSON.parse(response);
          if (!viewid_promo.error) {
            //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
            //convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
            sessionStorage.setItem('detpromoData', JSON.stringify(viewid_promo));
            //Se redirecciona al formulario de view luego de un segundo
            setTimeout(function() {
              window.location.href = '../forms/promociones/form_view.php';
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

/* todo promociones*/
//Mostrar registros existentes apenas ingresa a la pagina promociones.


$(document).ready(function() {
//Se verifica que la ruta del archivo termine en promociones.php para ejecutar la solicitud AJAX
if (window.location.pathname.endsWith("promociones.php")) {
//Se realiza la solicitud AJAX al cargar la página
$.ajax({
  method: 'POST',
  url: '../../../controller/promociones/todoPromociones.php',
  success: function(response) {
    var datos = JSON.parse(response);
    var tablaHTML = '';
    for (var i = 0; i < datos.length; i++) {
      tablaHTML += '<tr>';
      tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-id_promo="' + datos[i].id_promo + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
      tablaHTML += '<td>' + datos[i].id_promo+ '</td>';
      tablaHTML += '<td>' + datos[i].nom_promo + '</td>';
      tablaHTML += '<td>' + datos[i].totalpromo + '</td>';
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





