<?php
//Se guardan los datos enviados del formulario
  $id_categoria  = $_POST['id_categoria'];
  $nombre_cat  = $_POST['nombre_cat'];
  
//Se verifica que ningun dato este vacio
  if(empty($id_categoria) || empty($nombre_cat) )
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }
  else{
    try{

        # Incluimos la clase categorias
        require_once('../../model/categoria.php');

        # Creamos un objeto de la clase categorias
        $categorias = new Categorias();

        # Llamamos al metodo editarUsuario para realizar el update de los datos en la base de datos
        $categorias -> update_categorias($id_categoria ,$nombre_cat);
      // se redirecciona al usuario despues de realizar el update
      echo '../../categorias.php';

    }catch(PDOException $e){
      echo 'Error en el registro';
    }
  }

  ?>