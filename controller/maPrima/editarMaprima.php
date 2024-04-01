<?php

    // Se obtienen los datos enviados del formulario
   
    $cod_materia_pri= $_POST['cod_materia_pri'];
    $referencia= $_POST['referencia'];
    $descripcion= $_POST['descripcion'];
    $existencia= $_POST['existencia'];
    $entrada= $_POST['entrada'];
    $salida= $_POST['salida'];
    $stock= $_POST['stock'];

    echo $cod_materia_pri;
  
   
    //Se verifica que ningun dato este vacio
  if(empty($cod_materia_pri) || empty($referencia) || empty($descripcion) || empty($existencia) || empty($entrada) 
  || empty($salida) || empty($stock))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }
  else{

        # Incluimos la clase MAT_PRIMA
        require_once('../../model/mat_prima.php');
        # Creamos un objeto de la clase usuario
       $mat_pri = new Mat_prima();
       # Llamamos al metodo  para realizar la consulta en la base de datos
       $resultado = $mat_pri->update_mat_prima($cod_materia_pri,$referencia,$descripcion,$existencia,$entrada,$salida,$stock);
       if ($resultado) {
           #GUARDAMOS LA VARIABLE EN FORMATO json PARA PODER ENVIAR LOS DATOS DE LA CONSULTA POR MEDIO DEL AJAX
           $json_response = json_encode($resultado);
           echo $json_response;
       } else {
           $error = array('error' => 'No se encontraron datos del usuario');
           echo json_encode($error);
       }
  }
  
?>
