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
      $('#load').hide()
        // Manejar errores
        if(res.startsWith('error')) {
        if(res == 'error_1') {
            swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
        } else if(res == 'error_2') {
          swal('Error', 'Por favor ingresa un correo válido', 'warning');
      } else if(res == 'error_3') {
            swal('Error', 'La contraseña debe tener al menos 8 caracteres alfanuméricos', 'warning');
        }else if(res == 'error_4') {
            swal('Error', 'Las claves deben ser iguales, por favor inténtalo de nuevo', 'error');
        } else if(res == 'error_5') {
            swal('Error', 'Ocurrió un error al registrar el usuario', 'error');
        }else if(res == 'error_7') {
          swal('Error', 'Usuario ya registrado con ese correo', 'error');
       }else if(res == 'error_8') {
            swal('Error', 'Usuario ya registrado con ese documento', 'error');
         }else if(res == 'error_9') {
        swal('Error', 'Usuario ya registrado con ese correo y documento', 'error');
     }}
          else {
        swal({
          title: "Éxito",
          text: "El usuario ha sido registrado exitosamente",
          icon: "success",
          buttons: {
              confirm: "Aceptar",
          },
          dangerMode: false,
        }).then(function() {
          window.location.href = "../../clientes.php";
        });
      }
    },
    error: function(xhr) {
      console.error(xhr.responseText);
    }
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
              window.location.href = '../administrador/forms/clientes/form_edit.php';
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




$('#btneditar').click(function() {
  var form1 = $('#formeditar').serialize();

  console.log(form1);

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
        swal({
          title: "Éxito",
          text: "El registro se ha modificado de manera exitosa",
          icon: "success",
          buttons: {
              confirm: "Aceptar",
          },
          dangerMode: false,
        }).then((willConfirm) => {
          if (willConfirm) {
            // Realizar la redirección después de hacer clic en el botón de confirmación
            window.location.href = "../../clientes.php";
          }
        });
      }
    },
    error: function(xhr) {
      console.error(xhr.responseText);
    }
  });
});

//Editar Datos de Perfil

$('#btnEditarDatos').click(function() {
  var form1 = $('#formEditarDatos').serialize();

  console.log(form1);

  $.ajax({
    method: 'POST',
    url: '../../../controller/usuario/editarDatosPersonales.php',
    data: form1,
    beforeSend: function() {
      $('#load').show();
    },
    success: function(res) {

      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Por favor completa todos los campos', 'warning');
      } else{
        swal({
          title: "Enhorabuena! :)",
          text: "Datos Actualizados Correctamente.",
          icon: "success",
          buttons: {
              cancel: "Cancelar",
              confirm: "Aceptar",
          },
        })
      };
    },
    error: function(xhr) {
      console.error(xhr.responseText);
    }
  });
});

//Editar Datos de Contacto

$('#btnEditarContacto').click(function() {
  var form2 = $('#formEditarContacto').serialize();

  console.log(form2);

  $.ajax({
    method: 'POST',
    url: '../../../controller/usuario/editarDatosContacto.php',
    data: form2,
    beforeSend: function() {
      $('#load').show();
    },
    success: function(res) {
      $('#load').hide();

      if (res == 'error_1') {
        swal('Error', 'Por favor completa todos los campos', 'warning');
      } else {
     
      swal({
        title: "Datos actualizados :)",
        text: "Datos Actualizados Correctamente.",
        icon: "success",
        buttons: {
            cancel: "Cancelar",
            confirm: "Aceptar",
        },
        dangerMode: true,
      })
      window.location.href = res;
      // Cerrar el modal después de actualizar la contraseña
      };
    

    },
    error: function(xhr) {
      console.error(xhr.responseText);
    }
  });
});

//Datos Contacto
  $('#btnEditarSeguridad').click(function() {
      var doc = $('#modal_doc_2').val();
      var claveActual = $('#modal_clave').val();
      var validarClave = $('#modal_validar_clave').val();
      var confirmaClave = $('#modal_confirma_clave').val();

      // Enviar los datos del formulario al servidor
      $.ajax({
          method: 'POST',
          url: '/Proyecto/controller/usuario/editarClave.php',
          data: {
              modal_doc_2: doc,
              modal_clave: claveActual,
              modal_validar_clave: validarClave,
              modal_confirma_clave: confirmaClave
          },
          
          success: function(res) {
              // Verificar la respuesta del servidor
              if (res === 'error_1') {
                swal({
                  title: "¿Estás seguro?",
                  text: "Por favor, completa todos los campos.",
                  icon: "warning",
                  buttons: {
                      cancel: "Cancelar",
                      confirm: "Aceptar",
                  },
                  dangerMode: true,
                })
              } else if (res === 'error_2') {
                swal({
                  title: "¡Algo salio mal! :(",
                  text: "La clave nueva y de confirmacion, no coinciden.",
                  icon: "warning",
                  buttons: {
                      cancel: "Cancelar",
                      confirm: "Aceptar",
                  },
                  dangerMode: true,
                })
              } else if (res === 'error_3') {
                swal({
                  title: "¡Algo salio mal! :(",
                  text:  "La contraseña no cumple con los requisitos mínimos de seguridad",
                  icon: "warning",
                  buttons: {
                      cancel: "Cancelar",
                      confirm: "Aceptar",
                  },
                  dangerMode: true,
                })
              } else if (res === 'error_4') {
                swal({
                  title: "¡Algo salio mal! :(",
                  text: "la contraseña actual no es correcta.",
                  icon: "warning",
                  buttons: {
                      cancel: "Cancelar",
                      confirm: "Aceptar",
                  },
                  dangerMode: true,
                })
              }else {
                swal({
                  title: "Datos actualizados :)",
                  text: "Contraseña actualizada correctamente.",
                  icon: "warning",
                  buttons: {
                      cancel: "Cancelar",
                      confirm: "Aceptar",
                  },
                  dangerMode: true,
                })
              // Cerrar el modal después de actualizar la contraseña
              }
          },
          error: function(xhr, status, error) {
              console.error("Error al enviar los datos:", error);
              alert("Error al actualizar la contraseña. Por favor, inténtalo de nuevo más tarde.");
          }
      });
  });

$(document).ready(function() {
  $('#deleteUsuario').click(function() {
    var doc = $('#doc').text();
    $.ajax({
      method: 'POST',
      url: 'configuracion/eliminar.php',
      data: { deleteUsuario: doc },
      
      beforeSend: function() {
        $('#load').show();
      },
      success: function(res) {
        $('#load').hide();
        console.log("Respuesta del servidor:", res);
        if (res.trim() == 'eliminacion exitosa') {
            swal('Gracias', 'Usuario eliminado exitosamente', 'success');
            // Si deseas redirigir después de la eliminación exitosa, utiliza window.location.href
            // window.location.href = 'login.php';
        } else {
            swal('Error', 'No se pudo eliminar el usuario', 'error');
        }
    
        console.log("consulta exitosa")
  
        if (res == 'error_1') {
          swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
        } else if (res == 'error_2') {
          swal('Error', 'Las claves deben ser iguales, por favor intentalo de nuevo', 'error');
        } else if (res == 'error_3') {
          swal('Error', 'El correo que ingresaste ya se encuentra registrado', 'error');
        } else if (res == 'error_4') {
          swal('Error', 'Por favor ingresa un correo valido', 'warning');
        } else {
          swal('Gracias', 'lamentamos que ya no estes aqui gracias.', 'success');

          window.location.href = 'login.php';
        }
      },
      error: function(xhr) {
        console.error(xhr.responseText);
      }
    });
  });
});

//Solictud para eliminar registros

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

                  if (res.trim() == 'error_1') {
                      swal('Error', 'Ocurrió un error al eliminar el usuario', 'error');
                  } else {
                      swal({
                          title: "Éxito",
                          text: "Usuario eliminado exitosamente",
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
                  }
              },
              error: function(xhr) {
                  console.error(xhr.responseText);
              }
          });
      }
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
      url: '../../controller/usuario/controllerviewClientes.php',

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
          // Concatenar nombre y apellido
          var nombreCompleto = datos.nombre + " " + datos.apellido;
        
          // Utiliza text() para elementos que muestran texto (como h6)
          $('#nombreCompleto').text(nombreCompleto);
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
            console.error("Laruta de la url esta mal: " + status);
            console.error("Error: " + error);
        }
      });
  }
});


//Funcion para mostrar los datos del perfil en la parte de Editar

$(document).ready(function() {
  // Se verifica que la ruta del archivo termine en usuario.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("editar.php")) {
      $.ajax({
          method: 'POST',
          url: '/Proyecto/controller/usuario/mostrartodoUsuario.php',
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


//Datos para editar

$(document).ready(function() {
  // Se verifica que la ruta del archivo termine en usuario.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("editar.php")) {

    $.ajax({
      method: 'POST',
      url: '/Proyecto/controller/usuario/mostrartodoUsuario.php',
      success: function(response) {
          // Supongamos que response contiene los datos que quieres mostrar, por ejemplo:
          var datos = Array.isArray(response) ? response[0] : response;

          // Establecer el valor del input
          document.getElementById("modal_doc").value = datos.doc;
          document.getElementById("modal_nombre").value = datos.nombre;
          document.getElementById("modal_apellido").value = datos.apellido;
          document.getElementById("modal_genero").value = datos.genero;
      },
      error: function(xhr, status, error) {
          console.error("Error al obtener los datos:", error);
      }
    })
    }
});;



$(document).ready(function() {
  // Se verifica que la ruta del archivo termine en usuario.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("editar.php")) {

    $.ajax({
      method: 'POST',
      url: '/Proyecto/controller/usuario/mostrartodoUsuario.php',
      success: function(response) {
          // Supongamos que response contiene los datos que quieres mostrar, por ejemplo:
          var datos = Array.isArray(response) ? response[0] : response;

          // Establecer el valor del input
          document.getElementById("modal_doc_1").value = datos.doc;
          document.getElementById("modal_tel").value = datos.tel;
          document.getElementById("modal_direccion").value = datos.direccion;
          document.getElementById("modal_correo").value = datos.email;


      },
      error: function(xhr, status, error) {
          console.error("Error al obtener los datos:", error);
      }
    })
    }
});;

$(document).ready(function() {
  // Se verifica que la ruta del archivo termine en usuario.php para ejecutar la solicitud AJAX
  if (window.location.pathname.endsWith("editar.php")) {

    $.ajax({
      method: 'POST',
      url: '/Proyecto/controller/usuario/mostrartodoUsuario.php',
      success: function(response) {
          // Supongamos que response contiene los datos que quieres mostrar, por ejemplo:
          var datos = Array.isArray(response) ? response[0] : response;

          // Establecer el valor del input
          document.getElementById("modal_doc_2").value = datos.doc;
          document.getElementById("modal_clave").value = "";


      },
      error: function(xhr, status, error) {
          console.error("Error al obtener los datos:", error);
      }
    })
    }
});;



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

