<?php

    // Se obtienen los datos enviados del formulario
    $idproducto = $_POST['idproducto'];
    $nombre_pro = $_POST['nombre_pro'];
    $detalle = $_POST['detalle'];
    $precio_pro = $_POST['precio_pro'];
    $categorias_idcategoria = $_POST['categorias_idcategoria'];
    $foto = $_POST['foto'];
    $cod = $_POST['cod'];


   
    //Se verifica que ningun dato este vacio
  if(empty( $idproducto) || empty($nombre_pro) || empty($detalle) || empty($precio_pro) 
  || empty($categorias_idcategoria)|| empty($foto) || empty($cod) )
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }
  else{
    try{

        # Incluimos la clase usuario
        require_once('../../model/productos.php');

        # Creamos un objeto de la clase usuario
        $productos = new productos();

        # Llamamos al metodo editarUsuario para realizar el update de los datos en la base de datos
        $productos->  update_productos($idproducto,$nombre_pro,$detalle,$precio_pro,$categorias_idcategoria,$foto,$cod);
      // se redirecciona al usuario despues de realizar el update
      
     

    }catch(PDOException $e){
      echo 'Error en el registro';
    }
  }
?>
