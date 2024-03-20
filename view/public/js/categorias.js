


  //Funcion para ejecutar la busqueda cuando se haga click ene l boton btnbuscar
    $('#btnbuscar').click(function() {
        var buscar = $('#buscar').val();
  //Se realiza la solicitud AJAX para buscar según el valor ingresado
        $.ajax({
            method: 'POST',
            url: '../../../controller/categorias/mostrarCategoria.php',
            //se envia el valor del campo al controlador
            data: { buscar_php: buscar },
            success: function(response) {
                var datos = JSON.parse(response);
                var tablaHTML = '';
  //Se genera el HTML para visualizar el resultado de la busqueda en la tabla
                for (var i = 0; i < datos.length; i++) {
                    tablaHTML += '<tr>';
                    tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-id_categoria="' + datos[i].id_categoria + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
                    tablaHTML += '<td>' + datos[i].id_categoria + '</td>';
                    tablaHTML += '<td>' + datos[i].nombre_cat + '</td>';
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

//formulario de consulta para llevar datos del formulario  a modificar
//Usamos la función $document.ready para que el DOM se cargue completamente antes de ejecutar el código.

  $('#editButton').click(function() {
//Cuando se da click en el boton con el id EditButton , se recupera el valor id_categoria del checkbox seleccionado
    var id_categoria = $('input:checkbox:checked').data('id_categoria');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
      url: '../../../controller/categorias/view_categorias.php',
      //Se envía el dato 'id_categoria' al controlador PHP
      data: { id_categoria: id_categoria },
      //Si la solicitud es exitosa
      success: function(response) {
        try {

        //Se analiza la respuesta JSON obtenida del controlador y con la función json.parse convertimos la cadena de texto JSON a un objeto javascript
          var id_categoria = JSON.parse(response);
          if (!id_categoria.error) {
            //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
            //convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
            sessionStorage.setItem('categoriaData', JSON.stringify(id_categoria));
            //Se redirecciona al formulario de edicion luego de un segundo
            setTimeout(function() {
              window.location.href = '../forms/categorias/form_editar.php';
            }, 1000);
          } else {
            console.log(usuario.error);
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
    var editarCategoria = $('#editarCategoria').serialize();
console.log (editarCategoria);
    $.ajax({
      method: 'POST',
      url: '../../../../controller/categorias/editarCategoria.php',
      data: editarCategoria,
      beforeSend: function() {
        $('#load').show();
      },
      success: function(response) {
        $('#load').hide();
  
        if (response == 'error_1') {
          swal('Error', 'Campos obligatorios, por favor llena nombre de la categoria', 'warning');
        } else {
          window.location.href = '../../gestion/categorias_adm.php';
        }
      },
      error: function(xhr) {
        console.error(xhr.responseText);
      }
    });
  });


//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
document.addEventListener('DOMContentLoaded', function() {
  //Verificamos que en la asesión del navegador exista el elemento llamado 'categoriaData'
  var categoriaData = sessionStorage.getItem('categoriaData');

  //Si el 'categoriaData' existe, entonces convertimos el JSON almacenado en un array
  if (categoriaData) {
    var categoriaArray= JSON.parse(categoriaData);//este es el array
    //Obtenemos el primer objeto del array y lo asigna a la variable 'categorias'
    var categorias = categoriaArray[0];
    console.log(categorias);
    //creamos la funcion para poder llenar los campos del formulario
    function asignarvalores(){
    //se llenan los campos de acuerdo al id de cada uno en el formulario
    document.getElementById('id_categoria').value = categorias.id_categoria;
    document.getElementById('nombre_cat').value = categorias.nombre_cat;
    document.getElementById('doc_hidden').value = categorias.id_categoria;
    }
    //Llamamos la función para que se ejecute
    asignarvalores();
    //Eliminamos el elemento 'categoriaData' de la sesion de almacenamiento.
    sessionStorage.removeItem('categoriaData');
//Luego deshabilitamos los campos que no vamos a modificar
    document.getElementById('id_categoria').disabled = true;
   
//si no se encuentra 'categoriaData' entonces imprime el mensaje

  } else {
    console.log("No se han encontrado datos de la categoria");
  }
});



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

  $('#viewButton').click(function() {
    //Cuando se da click en el boton con el id viewButton , se recupera el valor id_categoria del checkbox seleccionado
        var view_categoria = $('input:checkbox:checked').data('id_categoria');
    //Se realiza la petición AJAX por metodo POST 
        $.ajax({
          method: 'POST',
          url: '../../../controller/categorias/view_categorias.php',
          //Se envía el dato 'id_categoria' al controlador PHP
          data: { id_categoria: view_categoria },
          //Si la solicitud es exitosa
          success: function(response) {
            try {
    
            //Se analiza la respuesta JSON obtenida del controlador y con la función json.parse convertimos 
            //la cadena de texto JSON a un objeto javascript
              var view_categoria = JSON.parse(response);
              if (!view_categoria.error) {
                //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos 
                //convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
                sessionStorage.setItem('viewData', JSON.stringify(view_categoria));
                //Se redirecciona al formulario de view luego de un segundo
                setTimeout(function() {
                  window.location.href = '../forms/categorias/form_view.php';
                }, 1000);
              } else {
                console.log(usuario.error);
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
    document.getElementById('id_categoria').value = viewData.id_categoria;
    document.getElementById('nombre_cat').value = viewData.nombre_cat;
    
    }
    //Llamamos la función para que se ejecute
    asignarvalores2();
    //Eliminamos el elemento 'viewData' de la sesion de almacenamiento.
    sessionStorage.removeItem('viewData');
//Luego deshabilitamos los campos que no vamos a modificar
    document.getElementById('id_categoria').disabled = true;
    document.getElementById('nombre_cat').disabled = true;
//si no se encuentra 'viewData' entonces imprime el mensaje

  } else {
    console.log("No se han encontrado datos de la categoria");
  }
});
  



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
