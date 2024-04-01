<?php


// Verificar si las variables POST están definidas


$nom_promo= $_POST['nom_promo'];
$totalpromo= $_POST['totalpromo'];
$categorias_idcategoria= $_POST['categorias_idcategoria'];



  
   
//Se verifica que ningun dato este vacio
if(empty($nom_promo) || empty($totalpromo) || empty($categorias_idcategoria) )
{

echo 'error_1'; // Un campo esta vacio y es obligatorio

}
else{

            // Incluimos la clase promocion
            require_once('../../model/promocion.php');

            // Creamos un objeto de la clase promocion
            $promocion = new Promocion();

            // Llamamos al método insert_promocion para insertar los datos en la base de datos
            $resultado=$promocion->insert_promocion($nom_promo,$totalpromo,$categorias_idcategoria);

            if ($resultado){
                echo json_encode($resultado);
            }else{
                    $error = array('error' => 'No se encontraron datos de promocion');
                    echo json_encode($error);
            }
    }

?>