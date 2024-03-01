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
    var id_categoria = $('input:checkbox:checked').data('id_categoria');
    console.log(id_categoria);

    $.ajax({
      method: 'POST',
      url: '../../controller/categorias/eliminarCategorias.php',
      data: { id_categoria:id_categoria},
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






  //view categorias  

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
        </div>`;
      // Agregar la categoría al contenedor
      listadoCategorias.append(categoriaHTML);
    });
  } else {  
    // Si categorias no es un array, muestra un mensaje de error
    console.error("La respuesta no es un array:", categorias);
    // Puedes agregar un mensaje o realizar alguna acción en caso de error
  }
}
//Muestra la Categoria
$(document).ready(function() {
  // Extraer el ID de la categoría de la URL
  var id_Categoria = new URLSearchParams(window.location.search).get('id_Categoria');

  // Llamar a la función para cargar productos
  cargarCategoria(id_Categoria);
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
