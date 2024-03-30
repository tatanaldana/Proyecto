//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
document.addEventListener('DOMContentLoaded', function() {
  //Verificamos que ne l asesión del navegador exista el elemnto llamado 'usuarioData'
  var usuarioData = sessionStorage.getItem('usuarioData');
  console.log(usuarioData);

  //Si el 'usuarioData' existe, entonces convertimos el JSON alamacenado en un array
  if (usuarioData) {
    var usuarioArray= JSON.parse(usuarioData);//este es el array
    //Obtenemos el primer objeto del array y lo asigna a la variable 'usuario'
    var usuario = usuarioArray[0];

    //creamos la funcion para poder llenar los campos del formulario
    function asignarvalores(){
    //se llenan los campos deacuerdo al id de cada uno en el formulariop
    document.getElementById('nombre').value = usuario.nombre;
    document.getElementById('apellido').value = usuario.apellido;
    document.getElementById('genero').value = usuario.genero;
    document.getElementById('fecha_naci').value = usuario.fecha_naci;
    document.getElementById('tipo_doc').value = usuario.tipo_doc;
    document.getElementById('doc').value = usuario.doc;
    document.getElementById('email').value = usuario.email;
    document.getElementById('direccion').value = usuario.direccion;
    document.getElementById('tel').value = usuario.tel;
    }
    //Llamamos la función para que se ejecute
    console.log(usuario.genero);
    console.log(usuario.tipo_doc);
    asignarvalores();
    //Eliminamos el elemento 'usuarioData' de la sesion de almacenamiento.
    sessionStorage.removeItem('usuarioData');
//Luego deshabilitamos los campos que no vamos a modificar
    document.getElementById('nombre').disabled = true;
    document.getElementById('apellido').disabled = true;
    document.getElementById('genero').disabled = true;
    document.getElementById('fecha_naci').disabled = true;
    document.getElementById('tipo_doc').disabled = true;
    document.getElementById('doc').disabled = true;
    document.getElementById('email').disabled = true;
    document.getElementById('direccion').disabled = true;
    document.getElementById('tel').disabled = true;
//si no se encuentra 'usuarioData' entonces imprime el mensaje

  } else {
    console.log("No se han encontrado datos del usuario");
  }
});