<?php

    // Se obtienen los datos enviados del formulario
   
    $id_promo= $_POST['id_promo'];
    $nom_promo= $_POST['nom_promo'];
    $totalpromo= $_POST['totalpromo'];
    $categorias_idcategoria= $_POST['categorias_idcategoria'];
    

    echo $id_promo;
  
   
    //Se verifica que ningun dato este vacio
  if(empty($id_promo) || empty($nom_promo) || empty($totalpromo) || empty($categorias_idcategoria) )
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }
  else{

        # Incluimos la clase promocion
        require_once('../../model/promocion.php');
        # Creamos un objeto de la clase promocion
       $promocion = new Promocion();
       # Llamamos al metodo  para realizar la consulta en la base de datos
       $resultado = $promocion->update_promocion($id_promo,$nom_promo,$totalpromo,$categorias_idcategoria);
       if ($resultado) {
           #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
           $json_response = json_encode($resultado);
           echo $json_response;
       } else {
           $error = array('error' => 'No se encontraron datos de promocion');
           echo json_encode($error);
       }
  }
  
?>
