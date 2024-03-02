// agregarcategorias.php

$(document).ready(function() {
  $('#btnagregarCategoria').click(function() {
    // Serializar los datos del formulario
    var formData = $('#agregarCategoria').serialize();

    // Imprimir los datos en la consola para verificar
    console.log('Datos del formulario:', formData);

    // Realizar la petición AJAX
    $.ajax({
      method: 'POST',
      url: '../../../../controller/categorias/agregarCategorias.php',
      data: formData,
      beforeSend: function() {
        $('#load').show(); // Mostrar un indicador de carga
      },
      success: function(response) {
        $('#load').hide(); // Ocultar el indicador de carga

        if (response === 'error_1') {
          swal('Error', 'Campo obligatorio, ', 'warning');
        } else {
          // Redirigir a otra página o realizar otra acción después de agregar la categoría
          window.location.href = '../../gestion/categorias_adm.php';
          
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });
  });
});




//editarcategoria.php

//
//
//
//
//
//




//eliminarcategorias.php

$(document).ready(function() {
  $('#deleteButton').click(function() {
      // Obtener el ID de categoría del checkbox marcado
      var id_categoria = $('input:checkbox:checked').data('id_categoria');

      // Verificar si se seleccionó alguna categoría
      if (id_categoria) {
          console.log('ID de categoría a eliminar:', id_categoria);

          // Realizar la solicitud AJAX para eliminar la categoría
          $.ajax({
              method: 'POST',
              url: '../../../controller/categorias/eliminarCategorias.php',
              data: { id_categoria: id_categoria },
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
                      window.location.href = '../gestion/categorias_adm.php';
                      // Puedes realizar cualquier acción adicional necesaria, como actualizar la interfaz de usuario
                   
                  } else {
                      // Ocurrió un error o la categoría no se pudo eliminar
                      // Mostrar un mensaje de error o manejar el caso según sea necesario
                      alert('Ocurrió un error al eliminar la categoría');
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
          alert('Por favor, selecciona una categoría para eliminar');
      }
  });
});




  //view categorias  

  function mostrarCategorias(categorias) {
    // Obtener el cuerpo de la tabla donde se mostrarán las categorías
    var tbody = $('#filasTabla');
    // Limpiar el contenido existente en el cuerpo de la tabla
    tbody.empty();
    // Iterar sobre las categorías y agregarlas a la tabla
    categorias.forEach(function(categoria) {
        // Crear una nueva fila de tabla
        var row = $('<tr>');
        // Crear el checkbox con el atributo data-id_categoria
        var checkbox = $('<input>').attr({
            type: 'checkbox',
            'data-id_categoria': categoria.id_categoria
        }).click(function() {
            toggleButtons(id_categoria);
        });
        // Agregar el checkbox a la primera celda de la fila
        $('<td>').append(checkbox).appendTo(row);
        // Agregar el ID de la categoría a la segunda celda de la fila
        $('<td>').text(categoria.id_categoria).appendTo(row);
        // Agregar el nombre de la categoría a la tercera celda de la fila
        $('<td>').text(categoria.nombre_categoria).appendTo(row);
        // Agregar la fila a la tabla
        row.appendTo(tbody);
    });
}


 
/*function cargarCategoria(id_Categoria) {
  if (id_Categoria !== null && id_Categoria !== undefined && id_Categoria !== '') {
    console.log('Antes de la llamada AJAX');
    $.ajax({
      method: 'GET',
      url: '../../../controller/categorias/view_categorias.php',
      data: { id_Categoria: id_Categoria }, // Pasar el ID de la categoría como parámetro
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

          // Verifica si es un array antes de llamar a mostrarcategorias
          if (Array.isArray(data)) {
            // Llama a la función para mostrar las categorias y pasa el id de la categoría
            mostrarcategorias(data, id_Categoria);
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
    console.error('ID de categoría no válido:', id_Categoria);
  }
}*/




/* todocategorias.php*/
//Mostrar registros existentes apenas ingresa a la pagina categorias.


$(document).ready(function() {
  //Se verifica que la ruta del archivo termine en categirias.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("categorias_adm.php")) {
    //Se realiza la solicitud AJAX al cargar la página
    $.ajax({
      method: 'POST',
      url: '../../../controller/categorias/todoCategorias.php',
      success: function(response) {
        var datos = JSON.parse(response);
        var tablaHTML = '';
        for (var i = 0; i < datos.length; i++) {
          tablaHTML += '<tr>';
          tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-id_categoria="' + datos[i].id_categoria + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
          tablaHTML += '<td>' + datos[i].id_categoria + '</td>';
          tablaHTML += '<td>' + datos[i].nombre_cat + '</td>';
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
