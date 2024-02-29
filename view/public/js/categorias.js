

//formulario de registro categorias
$('#agregarCategoria').click(function(){

  var form = $('#agregarCategoria').serialize();

  $.ajax({
    method: 'POST',
    url: '../../../controller/categorias/agregarCategorias.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campo obligatorio, ', 'warning');
      
        window.location.href = res ;
      }


    }
  });

});

//formulario de consulta para llevar datos del registro a modificar
//Uusamos la función $document.ready para que el DOM se cargue completamente antes de ejecutar el código.
$(document).ready(function() {
  $('#editButton').click(function() {
//Cunado se da click en el boton con el id EditButton , se reucpera el valor doc_usuario del checkbox seleccionado
    var doc = $('input:checkbox:checked').data('id_categoria');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
      url: '../../controller/categorias/view_Categorias.php',
      //Ser envía el dato 'doc' al controlador PHP
      data: { doc_php: doc },
      //Si la solicitud es exitosa
      success: function(response) {
        try {

        //Se analiza la respuesta JSON obtenida del controlador y 
        //con la función json.parse convertimos la cadena de texto JSON a un objeto javascript
          var categoria = JSON.parse(response);
          if (!categoria.error) {
            //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage',
            // pero debemos convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
            sessionStorage.setItem('categoriaData', JSON.stringify(categorias));
            //Se redirecciona al formulario de edicion luego de un segundo
            setTimeout(function() {
              window.location.href = '../administrador/forms/categorias/form_editar.php';
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
});


//Solictud para eliminar registros
$(document).ready(function() {
  $('#deleteButton').click(function() {
    var doc = $('input:checkbox:checked').data('id_categoria');
    console.log(doc);

    $.ajax({
      method: 'POST',
      url: '../../controller/categorias/eliminarCategorias.php',
      data: { doc_php:id },
      beforeSend: function() {
        $('#load').show();
      },
      success: function(res) {
        $('#load').hide();
  
        if (res == 'error_1') {
          swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
        } else if (res == 'error_2') {
          swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
        } else if (res == 'error_3') {
          swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
        } else if (res == 'error_4') {
          swal('Error', 'Por favor ingresa un correo valido', 'warning');
        } else {
          window.location.href = res;
        }
      },
      error: function(xhr) {
        console.error(xhr.responseText);
      }
    });
  });
});

//formulario de consulta para llevar datos del registro 
//Uusamos la función $document.ready para que el DOM se cargue completamente antes de ejecutar el código.
$(document).ready(function() {
  $('#viewButton').click(function() {
//Cunado se da click en el boton con el id EditButton , se reucpera el valor doc_usuario del checkbox seleccionado
    var doc = $('input:checkbox:checked').data('id_categoria');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
      url: '../../controller/categorias/view_categorias.php',
      //Ser envía el dato 'doc' al controlador PHP
      data: { doc_php: doc },
      //Si la solicitud es exitosa
      success: function(response) {
        try {

        //Se analiza la respuesta JSON obtenida del controlador y con la función json.parse convertimos la cadena de texto JSON a un objeto javascript
          var usuario = JSON.parse(response);
          if (!usuario.error) {
            //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
            sessionStorage.setItem('usuarioData', JSON.stringify(usuario));
            //Se redirecciona al formulario de edicion luego de un segundo
            setTimeout(function() {
              window.location.href = '../administrador/forms/categorias/form_view.php';
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
});
//Aca se realiza el envio del dato para realizar la busqueda relativa a la base
$(document).ready(function() {
//Funcion para ejecutar la busqueda cuando se haga click ene l boton btnbuscar
  $('#btnbuscar').click(function() {
      var buscar = $('#buscar').val();
//Se realiza la solicitud AJAX para buscar según el valor ingresado
      $.ajax({
          method: 'POST',
          url: '../../controller/usuario/mostrarController.php',
          //se envia el valor del campo al controlador
          data: { buscar_php: buscar },
          success: function(response) {
              var datos = JSON.parse(response);
              var tablaHTML = '';
//Se genera el HTML para visualizar el resultado de la busqueda en la tabla
              for (var i = 0; i < datos.length; i++) {
                  tablaHTML += '<tr>';
                  tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-doc-usuario="' + datos[i].doc + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
                  tablaHTML += '<td>' + datos[i].doc + '</td>';
                  tablaHTML += '<td>' + datos[i].nombre + '</td>';
                  tablaHTML += '<td>' + datos[i].apellido + '</td>';
                  tablaHTML += '<td>' + datos[i].tel + '</td>';
                  tablaHTML += '<td>' + datos[i].email + '</td>';
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
});



//Mostrar registros existentes apenas ingresa a la pagina categorias.php
$(document).ready(function() {
  //Se verifica que la ruta del archivo teremine en clientes.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("categorias.php")) {
    //Se realiza la solicitud AJAX al cargar la página
    $.ajax({
      method: 'POST',
      url: '../../controller/categorias/todoCategoriasr.php',

      success: function(response) {
        var datos = JSON.parse(response);
        var tablaHTML = '';

        for (var i = 0; i < datos.length; i++) {
          tablaHTML += '<tr>';
          tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" dataid_categoria="' + datos[i].id_categoria + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
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



$(document).ready(function() {
  $('#agregarCategoria').submit(function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    // Serializar los datos del formulario
    var formData = $(this).serialize();

    // Imprimir los datos en la consola para verificar
    console.log('Datos del formulario:', formData);

    // Realizar la petición AJAX
    $.ajax({
      method: 'POST',
      url: '../../controller/categorias/agregarCategorias.php',
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
          // window.location.href = ''; // Ruta a la que deseas redirigir
          console.log('Categoría agregada con éxito');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error en la solicitud AJAX:', status, error);
      }
    });
  });
});







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
    
    // Redirige a la página de categorias
    window.location.href = "../../administrador/gestion/categorias_adm.php?idCategoria=" + idCategoria;
  });
});


function obtenerCategorias() {
  var categorias;

  // Realizar la solicitud AJAX para obtener las categorías
  $.ajax({
    method: 'POST',
    url: '../controller/categorias/todoCategorias.php',
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
  var id_Categoria = new URLSearchParams(window.location.search).get('id_Categoria');

  // Llamar a la función para cargar productos
  cargarCategoria(id_Categoria);
});

function cargarCategoria(id_Categoria) {
  if (id_Categoria !== null) {
    console.log('Antes de la llamada AJAX');
    $.ajax({
      method: 'GET',
      url: '../../../controller/categorias/todoCategorias.php?id_Categoria=' + id_Categoria,
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

          // Verifica si es un array antes de llamar a mostrar categoria
          if (Array.isArray(data)) {
            // Llama a la función para mostrar las y pasa el id de la categoría
            mostrarCategoria(data, id_Categoria);
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


