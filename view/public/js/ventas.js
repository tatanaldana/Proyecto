$(document).ready(function() {
  //Funcion para ejecutar la busqueda cuando se haga click en el boton btnbuscar
  $('#btn_venta').click(function() {
      var buscar = $('#buscar').val();

      //Se realiza la solicitud AJAX para buscar según el valor ingresado
      $.ajax({
          method: 'POST',
          url: '../../controller/ventas/datosUsuarioVenta.php',
          //se envia el valor del campo al controlador
          data: { buscar_php: buscar },
          success: function(response) {
              try {
                  //Se analiza la respuesta JSON obtenida del controlador y con la función json.parse convertimos la cadena de texto JSON a un objeto javascript
                  var usuario = JSON.parse(response);
                  if (!usuario.error) {
                      //Si no hay errores en la respuesta, se almacena los datos de la consulta en un 'sessionstorage', pero debemos convertir las valores de la consulta otravez en una cadena json por medio de la funcion JSON.stringify
                      sessionStorage.setItem('usuarioData', JSON.stringify(usuario));
                      console.log(usuario);

                      // Ahora realizamos la segunda solicitud AJAX para obtener productos y precios
                      $.ajax({
                          url: '../../controller/productos/productosController.php',
                          method: 'get',
                          datatype: 'json',
                          success: function(response) {
                              try {
                                  // Se analiza la respuesta JSON obtenida del controlador
                                  var productosData = JSON.parse(response);
                                  if (!productosData.error) {
                                      // Si no hay errores en la respuesta, almacenamos los datos en sessionStorage
                                      sessionStorage.setItem('ProductosData', JSON.stringify(productosData));
                                      console.log(productosData);

                                      // Redireccionamos al formulario de venta después de completar ambas solicitudes AJAX
                                      window.location.href = '../administrador/forms/ventas/form_registro.php';
                                  } else {
                                      // Si hay un error en la respuesta, mostramos un mensaje de alerta
                                      console.log(productosData.error);
                                      alert("Productos no registrados. Por favor genere el registro en el sistema");
                                      window.location.href = '../administrador/forms/clientes/form_registro.php';
                                  }
                              } catch (error) {
                                  console.error('Error al analizar la respuesta JSON:', error);
                              }
                          },
                          error: function(xhr) {
                              console.error(xhr.responseText);
                          }
                      });
                  } else {
                      console.log(usuario.error);
                      alert("El cliente no está registrado. Por favor genere el registro en el sistema");
                      window.location.href = '../administrador/forms/clientes/form_registro.php';
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

$(document).ready(function() {
    $('#btnCalcular').click(function(event) {
        event.preventDefault();

        var detallesVenta = calcularTotal();
        var formData = new FormData($('#formventa')[0]);
        var usuarioData = sessionStorage.getItem('usuarioData');

        if (usuarioData) {
            var usuarios = JSON.parse(usuarioData);
            if (usuarios.length > 0) {
                var usuario = usuarios[0];
                if (usuario.hasOwnProperty('doc')) {
                    formData.append('documento_usuario', usuario.doc);
                    console.log('Documento del usuario:', usuario.doc);
                } else {
                    console.error('La propiedad "doc" no está definida en el objeto de usuario');
                    return;
                }
            } else {
                console.error('No se ha encontrado información del usuario en el sessionStorage');
                return;
            }
        }

        formData.append('detalles_venta', JSON.stringify(detallesVenta));

        $.ajax({
            type: 'POST',
            url: '../../../../controller/ventas/ingresarVenta.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                response = JSON.parse(response);
                if (response.success) {
                    alert(response.message);
                    window.location.href = "../../ventas.php";
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                console.error('Error en la petición AJAX: ' + xhr.responseText);
            }
        });
    });
});
//Aca se realiza el envio del dato para realizar la busqueda relativa a la base de ventas en preparacion 
$(document).ready(function() {
    //Funcion para ejecutar la busqueda cuando se haga click ene l boton btnbuscar
      $('#btnbuscar').click(function() {
          var buscar = $('#txtbuscar').val();
    //Se realiza la solicitud AJAX para buscar según el valor ingresado
          $.ajax({
              method: 'POST',
                url: '../../../../controller/ventas/ventasPreparacion.php',
              //se envia el valor del campo al controlador
              data: { buscar_php: buscar },
              success: function(response) {
                  var datos = JSON.parse(response);
                  var tablaHTML = '';
    //Se genera el HTML para visualizar el resultado de la busqueda en la tabla
                for (var i = 0; i < datos.length; i++) {
                    tablaHTML += '<tr>';
                    tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-doc-usuario="' + datos[i].doc + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
                    tablaHTML += '<td>' + datos[i].doc_cliente + '</td>';
                    tablaHTML += '<td>' + datos[i].fecha_venta + '</td>';
                    tablaHTML += '<td>' + datos[i].carrito_idcarrito + '</td>';
                    tablaHTML += '<td>' + datos[i].totalventa + '</td>';
                    tablaHTML += '<td>' + datos[i].estado + '</td>';
                    tablaHTML += '</tr>';
                }
    // se inserta el HTML generado en tbody de la tabla
                  $('#ventaspreparacion').html(tablaHTML);
              },
              error: function(xhr) {
                  console.error(xhr.responseText);
              }
          });
      });
    });



    //ventas en preparacion se cargan apenas ingrese a la pagina
    $(document).ready(function() {
        //Se verifica que la ruta del archivo teremine en clientes.php para ejecutar la solicitud AJAX
        if (window.location.pathname.endsWith("form_preparacion.php")) {
          //Se realiza la solicitud AJAX al cargar la página
          $.ajax({
            method: 'POST',
            url: '../../../../controller/ventas/mostrarVentaspre.php',
      
            success: function(response) {
              var datos = JSON.parse(response);
              var tablaHTML = '';
      
              for (var i = 0; i < datos.length; i++) {
                tablaHTML += '<tr>';
                tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-idcarrito="' + datos[i].carrito_idcarrito + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
                tablaHTML += '<td>' + datos[i].doc_cliente + '</td>';
                tablaHTML += '<td>' + datos[i].fecha_venta + '</td>';
                tablaHTML += '<td>' + datos[i].carrito_idcarrito + '</td>';
                tablaHTML += '<td>' + datos[i].totalventa + '</td>';
                tablaHTML += '<td>' + datos[i].estado + '</td>';
                tablaHTML += '</tr>';
            }
      
              $('#ventaspreparacion').html(tablaHTML);
          },
          error: function(xhr) {
            console.error(xhr.responseText);
          }
      });
      }
      });
    
//Compeltar venta (cambio de estado de 1 a 2)

$(document).ready(function() {
    $('#addButton2').click(function() {
  //Cunado se da click en el boton con el id EditButton , se reucpera el valor doc_usuario del checkbox seleccionado
      var idcarrito = $('input:checkbox:checked').data('idcarrito');
    
      console.log(idcarrito);
  //Se realiza la petición AJAX por metodo POST 
      $.ajax({
        method: 'POST',
        url: '../../../../controller/ventas/completarVentas.php',
        //Ser envía el dato 'doc' al controlador PHP
        data: { idcarrito_php: idcarrito },
        //Si la solicitud es exitosa
        success: function(response) {
            response = JSON.parse(response);

            console.log(response);
            if (response.success) {
                alert(response.message);
                window.location.href = "../../forms/ventas/form_preparacion.php";
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr,status, error) {
            console.error('Error en la petición AJAX: ' + error);
        }
      });
    });
  });

  //Eliminar venta en preparación

  $(document).ready(function() {
    $('#deleteButton2').click(function() {
  //Cunado se da click en el boton con el id deletebutton< , se reucpera el valor doc_usuario del checkbox seleccionado
      var doc = $('input:checkbox:checked').data('doc-usuario');
      console.log(doc);
  //Se realiza la petición AJAX por metodo POST 
      $.ajax({
        method: 'POST',
        url: '../../../../controller/ventas/eliminarVentas.php',
        //Ser envía el dato 'doc' al controlador PHP
        data: { doc_php: doc },
        //Si la solicitud es exitosa
        success: function(response) {
            response = JSON.parse(response);
            if (response.success) {
                alert(response.message);
                window.location.href = "../../forms/ventas/form_preparacion.php";
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function(xhr) {
            console.error('Error en la petición AJAX: ' + xhr.responseText);
        }
      });
    });
  });

   //Hisotrico de ventas compeltadas
   $(document).ready(function() {
    //Se verifica que la ruta del archivo teremine en form_historico.php para ejecutar la solicitud AJAX
    if (window.location.pathname.endsWith("form_historico.php")) {
      //Se realiza la solicitud AJAX al cargar la página
      $.ajax({
        method: 'POST',
        url: '../../../../controller/ventas/mostrarHistoricoVentas.php',
  
        success: function(response) {
          var datos = JSON.parse(response);
          var tablaHTML = '';
  
          for (var i = 0; i < datos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-idcarrito="' + datos[i].carrito_idcarrito + '" data-doc-usuario="' + datos[i].doc_cliente + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
            tablaHTML += '<td>' + datos[i].doc_cliente + '</td>';
            tablaHTML += '<td>' + datos[i].fecha_venta + '</td>';
            tablaHTML += '<td>' + datos[i].carrito_idcarrito + '</td>';
            tablaHTML += '<td>' + datos[i].totalventa + '</td>';
            tablaHTML += '<td>' + datos[i].estado + '</td>';
            tablaHTML += '</tr>';
        }
  
          $('#historicoventas').html(tablaHTML);
      },
      error: function(xhr) {
        console.error(xhr.responseText);
      }
  });
  }
  });

  $(document).ready(function() {
    $('#btnbuscar').click(function() {
    var fecha_inicial=$('#fecha_inicial').val();
    var fecha_final=$('#fecha_final').val();
      console.log(fecha_inicial);
      console.log(fecha_final);
  //Se realiza la petición AJAX por metodo POST 
      $.ajax({
        method: 'POST',
        url: '../../../../controller/ventas/buscarHistoricoVentas.php',
        //Ser envía el dato 'doc' al controlador PHP
        data: { fecha_inicial_php: fecha_inicial,
        fecha_final_php: fecha_final },
        //Si la solicitud es exitosa
        success: function(response) {
            var datos = JSON.parse(response);
            var tablaHTML = '';
    
            for (var i = 0; i < datos.length; i++) {
              tablaHTML += '<tr>';
              tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-idcarrito="' + datos[i].carrito_idcarrito + '" data-doc-usuario="' + datos[i].doc_cliente + '"style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
              tablaHTML += '<td>' + datos[i].doc_cliente + '</td>';
              tablaHTML += '<td>' + datos[i].fecha_venta + '</td>';
              tablaHTML += '<td>' + datos[i].carrito_idcarrito + '</td>';
              tablaHTML += '<td>' + datos[i].totalventa + '</td>';
              tablaHTML += '<td>' + datos[i].estado + '</td>';
              tablaHTML += '</tr>';
          }
    
            $('#historicoventas').html(tablaHTML);

            
        },
        error: function(error) {
            console.error('Error en la petición AJAX: ' + error);
        }
      });
    });
  });


  //Ajax para poder visualizar el detalle de la venta seleccionada
  $(document).ready(function() {
    $('#viewButton3').click(function() {
        // Cuando se da click en el botón con el id viewButton3, se recupera el valor doc_usuario del checkbox seleccionado
        var idcarrito = $('input:checkbox:checked').data('idcarrito');
        var doc = $('input:checkbox:checked').data('doc-usuario');
        console.log(idcarrito);
        console.log(doc);
        // Se realiza la petición AJAX por método POST
        $.ajax({
            method: 'POST',
            url: '../../../../controller/ventas/detalleHistoricoVentas.php',
            // Se envían los datos 'doc' y 'idcarrito' al controlador PHP
            data: {
                doc_php: doc,
                idcarrito_php: idcarrito
            },
            // Si la solicitud es exitosa
            success: function(response) {
                try {
                    // Se analiza la respuesta JSON obtenida del controlador y se convierte a un objeto JavaScript
                    var data = JSON.parse(response);
                    console.log(data);
                    if (!data.error) {
                        sessionStorage.setItem('usuarioData', JSON.stringify(data));
                        console.log(data);
                        // Redireccionamos al formulario de venta después de completar ambas solicitudes AJAX
                        window.location.href = 'form_visualizarHistorico.php';
                    } else {
                        console.error('Error en la solicitud AJAX:', data.error);
                    }
                } catch (error) {
                    console.error('Error al analizar la respuesta JSON:', error);
                }
            },
            error: function(xhr) {
                console.error('Error en la solicitud AJAX:', xhr.responseText);
            }
        });

        $.ajax({
            method: 'POST',
            url: '../../../../controller/ventas/detalleHistoricoVenta2.php',
            // Se envían los datos 'doc' y 'idcarrito' al controlador PHP
            data: {
                idcarrito_php: idcarrito
            },
            // Si la solicitud es exitosa
            success: function(response) {
                try {
                    // Se analiza la respuesta JSON obtenida del controlador y se convierte a un objeto JavaScript
                    var data1 = JSON.parse(response);
                    if (!data1.error) {
                        sessionStorage.setItem('ventaData', JSON.stringify(data1));
                        console.log(data1);
                        // Redireccionamos al formulario de venta después de completar ambas solicitudes AJAX
                        window.location.href = 'form_visualizarHistorico.php';
                    } else {
                        console.error('Error en la solicitud AJAX:', data1.error);
                    }
                } catch (error) {
                    console.error('Error al analizar la respuesta JSON:', error);
                }
            },
            error: function(xhr) {
                console.error('Error en la solicitud AJAX:', xhr.responseText);
            }
        });
    });
})

$(document).ready(function() {
    $('#viewButton2').click(function() {
        // Cuando se da click en el botón con el id viewButton3, se recupera el valor doc_usuario del checkbox seleccionado
        var idcarrito = $('input:checkbox:checked').data('idcarrito');
        var doc = $('input:checkbox:checked').data('doc-usuario');
        console.log(idcarrito);
        console.log(doc);
        // Se realiza la petición AJAX por método POST
        $.ajax({
            method: 'POST',
            url: '../../../../controller/ventas/detalleHistoricoVentas.php',
            // Se envían los datos 'doc' y 'idcarrito' al controlador PHP
            data: {
                doc_php: doc,
                idcarrito_php: idcarrito
            },
            // Si la solicitud es exitosa
            success: function(response) {
                try {
                    // Se analiza la respuesta JSON obtenida del controlador y se convierte a un objeto JavaScript
                    var data = JSON.parse(response);
                    console.log(data);
                    if (!data.error) {
                        sessionStorage.setItem('usuarioData', JSON.stringify(data));
                        console.log(data);
                        // Redireccionamos al formulario de venta después de completar ambas solicitudes AJAX
                        window.location.href = 'form_visualizarPreparacion.php';
                    } else {
                        console.error('Error en la solicitud AJAX:', data.error);
                    }
                } catch (error) {
                    console.error('Error al analizar la respuesta JSON:', error);
                }
            },
            error: function(xhr) {
                console.error('Error en la solicitud AJAX:', xhr.responseText);
            }
        });

        $.ajax({
            method: 'POST',
            url: '../../../../controller/ventas/detalleHistoricoVenta2.php',
            // Se envían los datos 'doc' y 'idcarrito' al controlador PHP
            data: {
                idcarrito_php: idcarrito
            },
            // Si la solicitud es exitosa
            success: function(response) {
                try {
                    // Se analiza la respuesta JSON obtenida del controlador y se convierte a un objeto JavaScript
                    var data1 = JSON.parse(response);
                    if (!data1.error) {
                        sessionStorage.setItem('ventaData', JSON.stringify(data1));
                        console.log(data1);
                        // Redireccionamos al formulario de venta después de completar ambas solicitudes AJAX
                        window.location.href = 'form_visualizarPreparacion.php';
                    } else {
                        console.error('Error en la solicitud AJAX:', data1.error);
                    }
                } catch (error) {
                    console.error('Error al analizar la respuesta JSON:', error);
                }
            },
            error: function(xhr) {
                console.error('Error en la solicitud AJAX:', xhr.responseText);
            }
        });
    });
})

//funciones para mostrar datos en pagina de ventas

document.addEventListener('DOMContentLoaded', function() {
    //Verificamos que ne l asesión del navegador exista el elemnto llamado 'usuarioData'
    var usuarioData = sessionStorage.getItem('usuarioData');
    console.log(usuarioData);
  
    //Si el 'usuarioData' existe, entonces convertimos el JSON alamacenado en un array
    if (usuarioData) {
      var usuarioArray= JSON.parse(usuarioData);//este es el array
      //Obtenemos el primer objeto del array y lo asigna a la variable 'usuario'
      var usuario = usuarioArray[0];
      
      var tablaHTML = '';
      tablaHTML += '<tr><td colspan="3">Datos del cliente</td></tr>';
      tablaHTML += '<tr>';
      tablaHTML += '<td>Documento: ' + usuario.doc + '</td>';
      tablaHTML += '<td>Nombre: ' + usuario.nombre + '</td>';
      tablaHTML += '<td>Apellido: ' + usuario.apellido + '</td>';
      tablaHTML += '</tr>';
      tablaHTML += '<tr>';
      tablaHTML += '<td>Telefono: ' + usuario.tel + '</td>';
      tablaHTML += '<td>Correo:' + usuario.email + '</td>';
      tablaHTML += '<td>Direccion:' + usuario.direccion + '</td>';
      tablaHTML += '</tr>';
     
      $('#TablaClientes').html(tablaHTML);
  
    } else {
      console.log("No se han encontrado datos del usuario");
    }
  });
 