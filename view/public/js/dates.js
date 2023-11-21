document.addEventListener('DOMContentLoaded', function() {
    var usuarioData = sessionStorage.getItem('usuarioData');
    if (usuarioData) {
      var usuario = JSON.parse(usuarioData);
      console.log(usuario);
      document.getElementById('nombre').value = usuario.nombre;
      document.getElementById('apellido').value = usuario.apellido;
      document.getElementById('genero').value = usuario.genero;
      document.getElementById('fecha_naci').value = usuario.fech_naci;
      document.getElementById('tipo_doc').value = usuario.tipo_doc;
      document.getElementById('doc').value = usuario.doc;
      document.getElementById('email').value = usuario.email;
      document.getElementById('direccion').value = usuario.direccion;
      document.getElementById('tel').value = usuario.tel;
      
  
      sessionStorage.removeItem('usuarioData');
    } else {
      console.log("No se han encontrado datos del usuario");
    }
  });