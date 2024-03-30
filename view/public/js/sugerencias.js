  $(document).ready(function() {
    //Se verifica que la ruta del archivo teremine en clientes.php para ejecutar la solicitud AJAX
    if (window.location.pathname.endsWith("sugerencias.php")) {
      //Se realiza la solicitud AJAX al cargar la página
      $.ajax({
        method: 'POST',
        url: '../../controller/pqr/controllerviewPQR.php',
  
        success: function(response) {
          var datos = JSON.parse(response);
          var tablaHTML = '';
  
          for (var i = 0; i < datos.length; i++) {
            tablaHTML += '<tr>';
            tablaHTML += '<td><div class="form-check"><input class="form-check-input" type="checkbox" data-doc-usuario="' + datos[i].doc + '" style="text-align:center" onchange="toggleButtons(this)"/></div></td>';
            tablaHTML += '<td>' + datos[i].usuarios_id + '</td>';
            tablaHTML += '<td>' + datos[i].nombre + '</td>';
            tablaHTML += '<td>' + datos[i].apellido + '</td>';
            tablaHTML += '<td>' + datos[i].id + '</td>';
            tablaHTML += '<td>' + datos[i].estado + '</td>';
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
