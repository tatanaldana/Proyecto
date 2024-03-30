<?php

require_once('../../../../model/conexion.php');
// Crear instancia de la clase Conexion
$conexion = new Conexion();
// Establecer la conexión
$pdo = $conexion->conexion();

$nombre_pro = $_POST['nombre_pro'];
$detalle = $_POST['detalle'];
$precio_pro = $_POST['precio_pro'];
$categoria = isset($_POST['opciones']) ? $_POST['opciones'] : null; // Verificar si 'opciones' está definido y no es nulo
$codigo = $_POST['cod'];

// Verificar si la categoría no es nula antes de realizar la inserción
if ($categoria !== null) {

//funcion para guardar una imagen 
$img = '';
if (isset($_FILES["img"])) {
    $file = $_FILES["img"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height =  $dimensiones[1];
    $carpeta = "../../../public/img/productos/";
    if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/JPEG' && $tipo != 'image/png' && $tipo != 'image/gif') {
        echo "Error, el archivo no es una imagen";
    } else if ($size > 3 * 1024 * 1024) {
        echo "Error, el tamaño maximo permitido es de 3MB";
    } else {
        $src = $carpeta . $nombre;
        move_uploaded_file($ruta_provisional, $src);
        $img = "../../../public/img/productos/" . $nombre;
    }
}
//fin para guardar una imagen
 
// Preparar la consulta SQL utilizando parámetros con marcadores de posición
$sql = "INSERT INTO productos(nombre_pro, detalle, precio_pro, categorias_idcategoria, cod) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nombre_pro, $detalle, $precio_pro, $categoria, $codigo]);

header("Location:../productos_adm.php");
} else {
// Si la categoría es nula, puedes mostrar un mensaje de error o redirigir de nuevo al formulario con un mensaje de error
echo "Error: La categoría seleccionada no es válida.";
// Opcionalmente, puedes redirigir de nuevo al formulario
// header("Location:../formulario_de_ingreso.php?error=categoria_nula");
exit; // Terminar el script para evitar que se ejecute el resto del código
}