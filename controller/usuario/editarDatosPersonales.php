<?php
//Se guardan los datos enviados del formulario

  $doc = $_POST['modal_doc'];
  $genero  = $_POST['modal_genero'];
  $nombre = $_POST['modal_nombre'];
  $apellido = $_POST ['modal_apellido'];

  $nombreCompleto = $nombre + '' +$apellido;
  $nombreCompleto = $_POST['modal_NombreCompleto'];

//Se verifica que ningun dato este vacio
  if(empty($genero) || empty($doc) || empty($nombre)|| empty($apellido))
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
        $usuario -> editar_datos_personales($doc, $genero, $nombre, $apellido);
      // se redirecciona al usuario despues de realizar el update
    }catch(PDOException $e){
      echo 'Error en el registro';
    }
  }

  ?>