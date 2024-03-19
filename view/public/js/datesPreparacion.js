//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
document.addEventListener('DOMContentLoaded', function() {
    //Verificamos que ne l asesión del navegador exista el elemnto llamado 'usuarioData'
    var usuarioData = sessionStorage.getItem('usuarioData');
    console.log(usuarioData);
  
    //Si el 'usuarioData' existe, entonces convertimos el JSON alamacenado en un array
    if (usuarioData) {
      var usuarioArray= JSON.parse(usuarioData);//este es el array
      //Obtenemos el primer objeto del array y lo asigna a la variable 'usuario'
      var resultado = usuarioArray[0];

        var tablaHTML = '';
        tablaHTML += '<tr><td colspan="3">Datos del cliente</td></tr>';
        tablaHTML += '<tr>';
        tablaHTML += '<td> Documento: ' + resultado.doc + '</td>';
        tablaHTML += '<td> Nombre: ' + resultado.nombre + '</td>';
        tablaHTML += '<td> Apellido: ' + resultado.apellido + '</td>';
        tablaHTML += '</tr>';
        tablaHTML += '<tr>';
        tablaHTML += '<td> Telefono: ' + resultado.tel + '</td>';
        tablaHTML += '<td> Correo: ' + resultado.email + '</td>';
        tablaHTML += '<td> Dirección: ' + resultado.direccion + '</td>';
        tablaHTML += '</tr>';
        totalventa=resultado.totalventa

        $('#datosdetalle').html(tablaHTML);
    
    } else {
      console.log("No se han encontrado datos del usuario");
    }

    var ventaData = sessionStorage.getItem('ventaData');
    console.log(ventaData);
  
    //Si el 'usuarioData' existe, entonces convertimos el JSON alamacenado en un array
    if (ventaData) {
      var venta= JSON.parse(ventaData);//este es el array
      //Obtenemos el primer objeto del array y lo asigna a la variable 'usuario'
      var resultado = venta;
      document.getElementById('formapago').value = resultado[0].forma_pago;

      var tablaHTML = '';

      for (var i = 0; i < resultado.length; i++){
      tablaHTML += '<tr>';
      tablaHTML += '<td> ' + resultado[i].producto + '</td>';
      tablaHTML += '<td> ' + resultado[i].precio + '</td>';
      tablaHTML += '<td> ' + resultado[i].cantidad + '</td>';
      tablaHTML += '<td> ' + resultado[i].subtotal + '</td>';
      tablaHTML += '</tr>';

      }
      tablaHTML+= '<tr>';
      tablaHTML+= '<td colspan="4">Total Venta:' + totalventa + '</td>'; // Mostramos el total de la venta
      tablaHTML+='</tr>';
      $('#detalleventa').html(tablaHTML);
    } else {
      console.log("No se han encontrado datos del usuario");
    }
  }
  
  );