<?php
// Verificar si la variable POST está definida
if(isset($_POST['idproducto'])) {
    $idproducto = $_POST['idproducto'];

    // Verificar si el ID de categoría no está vacío
    if(!empty($idproducto)){
        // Incluir el archivo de conexión a la base de datos y la clase Categorias
        require_once('../../model/productos.php');

        // Crear un objeto de la clase Categorias
        $productos = new productos();

        // Llamar al método para eliminar la categoría
        $result = $productos->eliminar_productos($idproducto);

        // Verificar si la eliminación fue exitosa
        if($result) {
           $response = array ("success" => true, "message" => "producto eliminado de manera exitosa");
           echo json_encode($response);
           
           
        } else {
            echo 'error_3'; // Error al eliminar el producto
        }
    } else {
        echo 'error_2'; // ID producto vacío
    }
} else {
    echo 'error_1'; // La variable POST "idproducto" no está definida

       

}
?>