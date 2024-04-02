

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




// agregar maprima.php

$(document).ready(function() {
$('#btnagregarpromo').click(function(e) {
  e.preventDefault(); // Previene el comportamiento predeterminado del envío del formulario

  var formData = $('#agregar_promocion').serialize(); // Serializa los datos del formulario

  // Realiza la solicitud AJAX
  $.ajax({
      method: 'POST',
      url: '../../../../controller/promociones/agregarPromociones.php',
      data: formData,
      beforeSend: function() {
          $('#load').show(); // Mostrar un indicador de carga si es necesario
      },
      success: function(response) {
          $('#load').hide(); // Ocultar el indicador de carga

          if (response === 'error_1') {
              swal('Error', 'Campo obligatorio, ', 'warning');
          } else {
              // Redirigir a otra página o realizar otra acción después de agregar la promocion
              window.location.href = '../../forms/promociones.php';
          }
      },
      error: function(xhr, status, error) {
          console.error('Error en la solicitud AJAX:', status, error);
      }
  });
});
});



//editarpromociones.php

$('#editButton').click(function() {
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
          var promoData = JSON.parse(response);
          if (!promoData.error) {
              // Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
              // convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
              sessionStorage.setItem('promoData', JSON.stringify(promoData));
              // Se redirecciona al formulario de edicion luego de un segundo
              setTimeout(function() {
                  window.location.href = '../forms/promociones/form_editar.php';
                  
              }, 1000);
          } else {
              console.log(promoData.error);
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
var editarpromo = $('#editarpromo').serialize();
console.log (editarpromo);
$.ajax({
  method: 'POST',
  url: '../../../../controller/promociones/editarPromociones.php',
  data: editarpromo,
  beforeSend: function() {
    $('#load').show();
  },
  success: function(response) {
    $('#load').hide();

    if (response == 'error_1') {
      swal('Error', 'Campos obligatorios,no se ha modificado la promocion', 'warning');
    } else {
      //swal('Exitoso', 'Campos obligatorios,no se ha modificado la promocion', 'success');
      window.location.href = '../promociones.php';

    }
  },
  error: function(xhr) {
    console.error(xhr.responseText);
  }
});
});


//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
document.addEventListener('DOMContentLoaded', function() {
//Verificamos que en la asesión del navegador exista el elemento llamado 'promoData'
var promoData = sessionStorage.getItem('promoData');

//Si promoData' existe, entonces convertimos el JSON almacenado en un array
if (promoData) {
var promoArray= JSON.parse(promoData);//este es el array
//Obtenemos el primer objeto del array y lo asigna a la variable 'promocion'
var promocion = promoArray[0];
console.log(promocion);
//creamos la funcion para poder llenar los campos del formulario
function asignarvalores(){
//se llenan los campos de acuerdo al id de cada uno en el formulario
document.getElementById('id_promo').value = promocion.id_promo;
document.getElementById('nom_promo').value = promocion.nom_promo;
document.getElementById('totalpromo').value = promocion.totalpromo;
document.getElementById('categorias_idcategoria').value = promocion.categorias_idcategoria;
document.getElementById('doc_hidden').value =promocion.id_promo;
}
//Llamamos la función para que se ejecute
asignarvalores();

//Luego deshabilitamos los campos que no vamos a modificar
document.getElementById('id_promo').disabled = true;
//Eliminamos el elemento 'promoData' de la sesion de almacenamiento.
sessionStorage.removeItem('promoData');

//si no se encuentra 'promoData' entonces imprime el mensaje

} else {
console.log("No se han encontrado datos de la promocion");
}
});



//eliminar promociones.php

$(document).ready(function() {
$('#deleteButton').click(function() {
  // Obtener el id_promo del checkbox marcado
  var id_promo = $('input:checkbox:checked').data('id_promo');

  // Verificar si se seleccionó alguna materia prima
  if (id_promo) {
      console.log('ID de promocion a eliminar:', id_promo);

      // Realizar la solicitud AJAX para eliminar la promocion 
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
              response=JSON.parse(res);
              // Verificar la respuesta del servidor
              if (response.success) {
                  
                  // La promocion se eliminó correctamente
                  alert(response.message);
                  // Puedes realizar cualquier acción adicional necesaria, como actualizar la interfaz de promocion
                  window.location.href = '../../administrador/forms/promociones.php';
                 
              } else {
                  // Ocurrió un error o la promocion no se pudo eliminar
                  // Mostrar un mensaje de error o manejar el caso según sea necesario
                  alert('Ocurrió un error al eliminar la promocion');
              }
          },
          error: function(xhr) {
              // Manejar errores de la solicitud AJAX
              console.error('Error en la solicitud AJAX:', xhr.responseText);
              alert('Ocurrió un error en la solicitud AJAX');
          }
      });
  } else {
      // No se seleccionó ninguna promocion, mostrar un mensaje de advertencia
      alert('Por favor, selecciona una promocion para eliminar');
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
            sessionStorage.setItem('viewData', JSON.stringify(viewid_promo));
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
document.getElementById('id_promo').value = viewData.id_promo;
document.getElementById('nom_promo').value = viewData.nom_promo;
document.getElementById('totalpromo').value = viewData.totalpromo;
document.getElementById('categorias_idcategoria').value = viewData.categorias_idcategoria;

}
//Llamamos la función para que se ejecute
asignarvalores2();
//Eliminamos el elemento 'viewData' de la sesion de almacenamiento.
sessionStorage.removeItem('viewData');
//Luego deshabilitamos los campos que no vamos a modificar
document.getElementById('id_promo').disabled = true;
document.getElementById('nom_promo').disabled = true;
document.getElementById('totalpromo').disabled = true;
document.getElementById('categorias_idcategoria').disabled = true;

//si no se encuentra 'viewData' entonces imprime el mensaje

} else {
console.log("No se han encontrado datos de la promocion");
}
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
      tablaHTML += '<td>' + datos[i].categorias_idcategoria + '</td>';
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





