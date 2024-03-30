//formulario de registro pqr usuario
$('#enviar').click(function(){

  var form = $('#formulario_pqr').serialize();
  console.log(form);

  $.ajax({
    method: 'POST',
    url: '../../controller/pqr/agregarpqr.php',
    data: form,
    beforeSend: function(){
      $('#load').show();
    },
    success: function(res){
      $('#load').hide();

      if(res == 'error_1'){
        swal('Error', 'Campos obligatorios, por favor llena el email y las claves', 'warning');
      }else{
        swal({
           title: '¡Correcto!',
           text: 'Se ha enviado la PQR correctamente',
           type: 'success'
         }),
        window.location.href = sugerenciasuser.php ;
      }


    }
  });

});