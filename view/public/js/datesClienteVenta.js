//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
/*document.addEventListener('DOMContentLoaded', function() {
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
*/