<?php
// Verificar si las variables POST están definidas

    $referencia = $_POST['referencia'];
    $descripcion = $_POST['descripcion'];
    $existencia = $_POST['existencia'];
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];
    $stock = $_POST['stock'];


    if(empty($referencia)|| empty($descripcion) || empty($existencia) || empty($entrada) 
  || empty($salida) || empty($stock))
{
    echo 'error_1'; // Un campo está vacío y es obligatorio

    } else {

            // Incluimos la clase Categorias
            require_once('../../model/promocion.php');

            // Creamos un objeto de la clase maprima
            $promocion = new Promocion();

            // Llamamos al método insert_mat_prima para insertar los datos en la base de datos
            $RESULTADO=$mat_Prima->insert_promocion($referencia,$descripcion,$existencia,$entrada,$salida,$stock);

            if ($RESULTADO){
                echo json_encode($RESULTADO);
            }else{
                    $error = array('error' => 'No se encontraron datos del usuario');
                    echo json_encode($error);
            }
    }

?>