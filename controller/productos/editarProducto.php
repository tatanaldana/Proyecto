<?php

// Se obtienen los datos enviados del formulario
$idproducto = $_POST['idProducto'];
$nombre_pro = $_POST['nombre_pro'];
$detalle = $_POST['detalle'];
$precio_pro = $_POST['precio_pro'];
$categorias_idcategoria = $_POST['categorias_idcategoria'];
$cod = $_POST['cod'];

// Verifica si el campo 'foto' está presente en los datos POST
if(isset($_POST['foto'])) {
    $foto = $_POST['foto'];
} else {
    $foto = null; // Establece $foto como null si no está presente
}

// Se verifica que ningun dato este vacio
if(empty($idproducto) || empty($nombre_pro) || empty($detalle) || empty($precio_pro) || empty($categorias_idcategoria) || empty($cod)) {
    echo 'error_1'; // Un campo está vacío y es obligatorio
} else {
    try {
        # Incluimos la clase productos
        require_once('../../model/productos.php');

        # Creamos un objeto de la clase productos
        $productos = new Productos();

        # Llamamos al método update_productos para realizar el update de los datos en la base de datos
        $productos->update_productos($idproducto, $nombre_pro, $detalle, $precio_pro, $categorias_idcategoria, $foto, $cod);

        // Se redirecciona después de realizar el update
        // Aquí puedes redirigir a donde sea necesario
        // Por ejemplo:
        // header('Location: ../productos_adm.php');
        // exit();

    } catch(PDOException $e) {
        echo 'Error en el registro';
    }
}
?>