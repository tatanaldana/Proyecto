<?php

require_once('../../model/usuario.php');
usuario::verificarSesion();

  $name   = $_POST['name'];
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
  $clave2 = $_POST['clave2'];




  if(empty($email) || empty($clave) || empty($clave2) || empty($apellido))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{

    if($clave == $clave2){

      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        # Incluimos la clase usuario
        

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        $usuario -> registroUsuario2($name, $email, $clave, $tel, $apellido, $genero, $fecha_naci, $tipo_doc, $doc, $fecha_reg, $direccion);


        
      }else{
        echo 'error_4';
      }


    }else{
      echo 'error_2';
    }

  }
