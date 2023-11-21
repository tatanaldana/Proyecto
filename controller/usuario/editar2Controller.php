<?php

  $nombre   = $_POST['name'];
  $apellido   = $_POST['apellido'];
  $email  = $_POST['email'];
  $tel  = $_POST['tel'];
  $genero  = $_POST['genero'];
  $fecha_naci  = $_POST['fecha_naci'];
  $tipo_doc = $_POST['tipo_doc'];
  $doc = $_POST['doc'];
  $fecha_reg = date ("y,m,d");
  $direccion  = $_POST['direccion'];
  $clave  = $_POST['clave'];
 


  if(empty($nombre) || empty($apellido) || empty($email) || empty($tel) || empty($genero) 
|| empty($fecha_naci) || empty($tipo_doc) || empty($doc) || empty($direccion) || empty($clave))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }
  else{

        # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        $usuario -> registroUsuario2($nombre, $email, $clave, $tel, $apellido, $genero, $fecha_naci, $tipo_doc, $doc, $fecha_reg, $direccion);

  }

  ?>