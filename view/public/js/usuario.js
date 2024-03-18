$('#login').click(function(){

  // Traemos los datos de los inputs
  var user  = $('#user').val();
  var clave = $('#clave').val();

  // Envio de datos mediante Ajax
  $.ajax({
    method: 'POST',
    // Recuerda que la ruta se hace como si estuvieramos en el index y no en operaciones por esa razon no utilizamos ../ para ir a controller
    url: '../controller/usuario/loginController.php',
    // Recuerda el primer parametro es la variable de php y el segundo es el dato que enviamos
    data: {user_php: user, clave_php: clave},
    // Esta funcion se ejecuta antes de enviar la información al archivo indicado en el parametro url
    beforeSend: function(){
      // Mostramos el div con el id load mientras se espera una respuesta del servidor (el archivo solicitado en el parametro url)
      $('#load').show();
    },
    // el parametro res es la respuesta que da php mediante impresion de pantalla (echo)
    success: function(res){
      // Lo primero es ocultar el load, ya que recibimos la respuesta del servidor
      $('#load').hide();

      // Ahora validamos la respuesta de php, si es error_1 algun campo esta vacio de lo contrario todo salio bien y redireccionaremos a donde diga php
      if(res == 'error_1'){
        /*
        Para usar sweetalert es muy sencillo, has de cuenta que haces un alert
        solo que esta ves enviaras 3 parametros separados por comas, el primero
        es el titulo de la alerta, el segundo es la descripcion y el tercero es el tipo de alerta
        en el momento conozco tres tipos, entonces puedes variar entre success: Muestra animación de un check,
        warning: muestra icono de advertencia amarillo y error: muestra una animacion con una X muy chula :v
        */
        swal('Error', 'Por favor ingrese todos los campos', 'error');
      }else if(res == 'error_2'){
        // Recuerda que si no necesitas validar si es un email puedes eliminar el if de la linea 34
        swal('Error', 'Por favor ingrese un email valido', 'warning');
      }else if(res == 'error_3'){
        swal('Error', 'El usuario y contraseña que ingresaste es incorrecto', 'error');
      }else{
        // Redireccionamos a la página que diga corresponda el usuario
        window.location.href= res
      }

    }
  });

});

//formulario de registro usuario
$('#registro').click(function(){

  var form = $('#formulario_registro').serialize();

  $.ajax({
    method: 'POST',
    url: '../controller/usuario/registroController.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
      }else if(res == 'error_2'){
        swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
      }else if(res == 'error_3'){
        swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
      }else if(res == 'error_4'){
        swal('Error', 'Por favor ingresa un correo valido', 'warning');
      }else{
        window.location.href = res ;
      }


    }
  });

});
//Fomrulaio de registro administrador
$(document).ready(function() {
  $('#btnregistro').click(function() {
    var form1 = $('#formregistro').serialize();
    
    $.ajax({
      method: 'POST',
      url: '../../../../controller/usuario/registro2Controller.php',
      data: form1,
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
//formulario de consulta para llevar datos del registro a modificar
//Uusamos la función $document.ready para que el DOM se cargue completamente antes de ejecutar el código.
$(document).ready(function() {
  $('#editButton').click(function() {
//Cunado se da click en el boton con el id EditButton , se reucpera el valor doc_usuario del checkbox seleccionado
    var doc = $('input:checkbox:checked').data('doc-usuario');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
      url: '../../controller/usuario/viewController.php',
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
              window.location.href = '../administrador/forms/clientes/form_editar.php';
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
//Datos para realizar update del registro
$(document).ready(function() {
  $('#btneditar').click(function() {
    var form1 = $('#formeditar').serialize();

    $.ajax({
      method: 'POST',
      url: '../../../../controller/usuario/editarController.php',
      data: form1,
      beforeSend: function() {
        $('#load').show();
      },
      success: function(res) {
        $('#load').hide();
  
        if (res == 'error_1') {
          swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
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
//Solictud para eliminar registros
$(document).ready(function() {
  $('#deleteButton').click(function() {
    var doc = $('input:checkbox:checked').data('doc-usuario');
    console.log(doc);

    $.ajax({
      method: 'POST',
      url: '../../controller/usuario/eliminarController.php',
      data: { doc_php: doc },
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
    var doc = $('input:checkbox:checked').data('doc-usuario');
//Se realiza la petición AJAX por metodo POST 
    $.ajax({
      method: 'POST',
      url: '../../controller/usuario/viewController.php',
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
              window.location.href = '../administrador/forms/clientes/form_view.php';
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

//Mostrar registros existentes apenas ingresa a la pagina clientes.php
$(document).ready(function() {
  //Se verifica que la ruta del archivo teremine en clientes.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("clientes.php")) {
    //Se realiza la solicitud AJAX al cargar la página
    $.ajax({
      method: 'POST',
      url: '../../controller/usuario/mostrartodoController.php',

      success: function(response) {
        var datos = JSON.parse(response);
        var tablaHTML = '';

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

        $('#filasTabla').html(tablaHTML);
    },
    error: function(xhr) {
      console.error(xhr.responseText);
    }
});
}
});


//Funcion para mostrar los datos del perfil

$(document).ready(function() {
  // Se verifica que la ruta del archivo termine en usuario.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("perfil.php")) {
      // Se realiza la solicitud AJAX al cargar la página
      $.ajax({
          method: 'POST',
          url: '../../controller/usuario/mostrartodoUsuario.php',
          success: function(response) {
            console.log(response);  // Imprime la respuesta en la consola
        
            // No es necesario parsear la respuesta si ya es un objeto JSON
            var datos = Array.isArray(response) ? response[0] : response;
            console.log(datos);     // Imprime los datos en la consola
        
            // Utiliza text() para elementos que muestran texto (como h6)
            $('#nombre').text(datos.nombre);
            $('#apellido').text(datos.apellido);
            $('#email').text(datos.email);
            $('#genero').text(datos.genero);
            $('#fecha_naci').text(datos.fecha_naci);
            $('#tipo_doc').text(datos.tipo_doc);
            $('#doc').text(datos.doc);
            $('#tel').text(datos.tel);
            $('#direccion').text(datos.direccion);
        },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error("Status: " + status);
            console.error("Error: " + error);
        }
      });
  }
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
                          <img src="../../public/img/productos/${producto.nombre_pro}.jpeg" alt="${producto.nombre_pro}">
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


//Funcion para mostrar los datos del perfil

$(document).ready(function() {
  // Se verifica que la ruta del archivo termine en usuario.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("pagodatos.php")) {
      // Se realiza la solicitud AJAX al cargar la página
      $.ajax({
          method: 'POST',
          url: '../../../controller/usuario/mostrartodoUsuario.php',
          success: function(response) {
            console.log(response);  // Imprime la respuesta en la consola
        
            // No es necesario parsear la respuesta si ya es un objeto JSON
            var datos = Array.isArray(response) ? response[0] : response;
            console.log(datos);     // Imprime los datos en la consola
        
            // Utiliza text() para elementos que muestran texto (como h6)
            $('#nombre').text(datos.nombre);
            $('#apellido').text(datos.apellido);
            $('#email').text(datos.email);
            $('#genero').text(datos.genero);
            $('#fecha_naci').text(datos.fecha_naci);
            $('#tipo_doc').text(datos.tipo_doc);
            $('#doc').text(datos.doc);
            $('#tel').text(datos.tel);
            $('#direccion').text(datos.direccion);
        },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error("Status: " + status);
            console.error("Error: " + error);
        }
      });
  }
});


$(document).ready(function() {
  // Se verifica que la ruta del archivo termine en usuario.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("chekckout.php")) {
      // Se realiza la solicitud AJAX al cargar la página
      $.ajax({
          method: 'POST',
          url: '../../../controller/usuario/mostrartodoUsuario.php',
          success: function(response) {
            console.log(response);  // Imprime la respuesta en la consola
        
            // No es necesario parsear la respuesta si ya es un objeto JSON
            var datos = Array.isArray(response) ? response[0] : response;
            console.log(datos);     // Imprime los datos en la consola
        
            // Utiliza text() para elementos que muestran texto (como h6)
            $('#nombre').text(datos.nombre);
            $('#apellido').text(datos.apellido);
            $('#email').text(datos.email);
            $('#genero').text(datos.genero);
            $('#fecha_naci').text(datos.fecha_naci);
            $('#tipo_doc').text(datos.tipo_doc);
            $('#doc').text(datos.doc);
            $('#tel').text(datos.tel);
            $('#direccion').text(datos.direccion);
        },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
            console.error("Status: " + status);
            console.error("Error: " + error);
        }
      });
  }
});

