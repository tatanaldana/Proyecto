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