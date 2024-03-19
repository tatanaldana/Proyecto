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

    console.log(form1);

    $.ajax({
      method: 'POST',
      url: '../../../controller/usuario/editarController.php',
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


$('#btneditar').click(function() {
  var form1 = $('#formeditar').serialize();

  console.log(form1);

  $.ajax({
    method: 'POST',
    url: '../../../controller/usuario/editarDatosContacto.php',
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




// $('#btnEditarSeguridad').click(function() {
//   var form1 = $('#formEditarSeguridad').serialize();


//   $.ajax({
//     method: 'POST',
//     url: '../../../controller/usuario/editarClave.php',
//     data: form1,
//     beforeSend: function() {
//       $('#load').show();
//     },
//     success: function(res) {
//       $('#load').hide();

//       if (res == 'error_1') {
//         swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
//       } else {
//         window.location.href = res;
//       }
//     },
//     error: function(xhr) {
//       console.error(xhr.responseText);
//     }
  
//   });
// });

$(document).ready(function() {
  $('#btnEditarSeguridad').click(function() {
      var doc = $('#modal_doc_2').val();
      var clave = $('#modal_clave').val();
      var validarClave = $('#modal_validar_clave').val();
      var confirmaClave = $('#modal_confirma_clave').val();

      // Verificar que la contraseña nueva y la confirmación coincidan
      if (validarClave !== confirmaClave) {
          alert("La nueva contraseña y la confirmación no coinciden.");
          return;
      }

      // Enviar los datos del formulario al servidor
      $.ajax({
          method: 'POST',
          url: '/Proyecto/controller/usuario/editarClave.php',
          data: {
              modal_doc_2: doc,
              modal_clave: clave,
              modal_validar_clave: validarClave
          },
          success: function(response) {
              // Verificar la respuesta del servidor
              if (response === 'error_1') {
                  alert("Por favor, completa todos los campos.");
              } else if (response === 'No a iniciado Sesion.') {
                  alert("No ha iniciado sesión.");
              } else if (response === 'La contraseña actual no es correcta') {
                  alert("La contraseña actual no es correcta.");
              } else {
                  alert("Contraseña actualizada correctamente.");
              // Cerrar el modal después de actualizar la contraseña
              }
          },
          error: function(xhr, status, error) {
              console.error("Error al enviar los datos:", error);
              alert("Error al actualizar la contraseña. Por favor, inténtalo de nuevo más tarde.");
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

    console.log('sirvio')
      // Se realiza la solicitud AJAX al cargar la página
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

<<<<<<< HEAD
=======
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
>>>>>>> dce3665cacae41f199be9a54e9af2fd35a5bf9a7




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

