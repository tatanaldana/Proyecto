<?php
//Se guardan los datos enviados del formulario

  $doc=$_POST['modal_doc_1'];
  $email  = $_POST['modal_correo'];
  $tel = $_POST['modal_tel'];
  $direccion = $_POST ['modal_direccion'];


//Se verifica que ningun dato este vacio
  if(empty($email) || empty($tel) || empty($direccion))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }
  else{
    try{

        # Incluimos la clase usuario
        require_once('../../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo editarUsuario para realizar el update de los datos en la base de datos
        $usuario -> editar_datos_Contacto($doc, $email, $tel, $direccion);
      // se redirecciona al usuario despues de realizar el update

      
  
     

    }catch(PDOException $e){
      echo 'Error en el registro';
    }
  }

  ?>