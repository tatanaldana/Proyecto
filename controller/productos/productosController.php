<?php
    # Incluimos la clase producto
    require_once('../../model/productos.php');

    # Creamos un objeto de la clase usuario
    $productos = new Productos();

    # Llamamos al metodo login para validar los datos en la base de datos
    $resultado = $productos -> get_productos2();

    
# Verificamos si se obtuvieron resultados
if (count($resultado) > 0) {
    // Inicializa los arrays para almacenar los productos y precios
    $productos = array();
    $precios = array();

    // Obtiene los datos de la tabla y los almacena en los arrays
    foreach ($resultado as $row) {
        $productos[] = $row["nombre_pro"];
        $precios[] = $row["precio_pro"];
    }
    $json_response = json_encode(array("productos" => $productos, "precios" => $precios));
    echo $json_response;
} else {
    echo json_encode(array("error" => "No se encontraron productos en la base de datos."));
}
?>
