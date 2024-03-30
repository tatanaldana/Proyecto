//Aca esperamos que cargue totalmente el DOM para poder iniciar el código
document.addEventListener('DOMContentLoaded', function() {
    //Verificamos que en la asesión del navegador exista el elemento llamado 'MAPRIMAData'
    var maprimaData = sessionStorage.getItem('maprimaData');
  
    //Si maprimaData' existe, entonces convertimos el JSON almacenado en un array
    if (maprimaData) {
      var maprimaArray= JSON.parse(maprimaData);//este es el array
      //Obtenemos el primer objeto del array y lo asigna a la variable 'maprima'
      var maprima = maprimaArray[0];
      console.log(maprima);
      //creamos la funcion para poder llenar los campos del formulario
      function asignarvalores(){
      //se llenan los campos de acuerdo al id de cada uno en el formulario
      document.getElementById('cod_materia_pri').value = maprima.cod_materia_pri;
      document.getElementById('cod_materia_pri').disabled = true;
      document.getElementById('referencia').value = maprima.referencia;
      document.getElementById('descripcion').value = maprima.descripcion;
      document.getElementById('existencia').value = maprima.existencia;
      document.getElementById('entrada').value = maprima.entrada;
      document.getElementById('salida').value = maprima.salida;
      document.getElementById('stock').value = maprima.stock;
      document.getElementById('cod_hidden').value = maprima.cod_materia_pri;
      
      }
      asignarvalores();
 
      //Eliminamos el elemento 'maprimaData' de la sesion de almacenamiento.
      sessionStorage.removeItem('maprimaData');
      //Luego deshabilitamos los campos que no vamos a modificar
      
     
  //si no se encuentra 'MAPRIMAData' entonces imprime el mensaje
  
    } else {
      console.log("No se han encontrado datos de la materia prima");
    }
  });
  