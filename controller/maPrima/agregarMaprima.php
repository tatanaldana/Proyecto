<?php
// Verificar si las variables POST están definidas

if(isset($_POST['cod_materia_pri'])) {
    
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
        try {
            // Incluimos la clase Categorias
            require_once('../../model/mat_prima.php');

            // Creamos un objeto de la clase maprima
            $mat_Prima = new Mat_Prima();

            // Llamamos al método insert_mat_prima para insertar los datos en la base de datos
            $mat_Prima->insert_mat_prima($referencia,$descripcion,$existencia,$entrada,$salida,$stock);
        } catch(PDOException $e) {
            echo 'error en el registro';
        }
    }
} else {
    echo 'error_2'; // Alguna de las variables POST no está definida
}
?>