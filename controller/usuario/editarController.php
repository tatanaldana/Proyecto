<?php
//Se guardan los datos enviados del formulario
  $email  = $_POST['email'];
  $tel  = $_POST['tel'];
  $genero  = $_POST['genero'];
  $direccion  = $_POST['direccion'];
  $doc=$_POST['doc'];


//Se verifica que ningun dato este vacio
  if(empty($email) || empty($tel) || empty($genero) || empty($direccion) || empty($doc))
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
        $usuario -> editarUsuario($email, $tel, $genero, $direccion,$doc);
      // se redirecciona al usuario despues de realizar el update
      echo '../../clientes.php';

    }catch(PDOException $e){
      echo 'Error en el registro';
    }
  }

  ?>