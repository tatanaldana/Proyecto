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
