
<?php
// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'arca');

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$idproducto = $_POST['idproducto'];
$nombre_pro = $_POST['nombre_pro'];
$detalle = $_POST['detalle'];
$precio_pro = $_POST['precio_pro'];
$categorias_idcategoria = $_POST['categorias_idcategoria'];
$img = $_POST['img'];
$cod = $_POST['cod'];


//funcion para guardar una imagen 
/*$img = '';
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
    if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/JPEG'
     && $tipo != 'image/png' && $tipo != 'image/gif') {
        echo "Error, el archivo no es una imagen";
    } else if ($size > 3 * 1024 * 1024) {
        echo "Error, el tamaño maximo permitido es de 3MB";
    } else {
        $src = $carpeta . $nombre;
        move_uploaded_file($ruta_provisional, $src);
        $img = "../../../public/img/productos/" . $nombre;
    }
}*/
//fin para guardar una imagen

// Preparar y ejecutar la consulta SQL
$stmt = "INSERT INTO productos (idProducto, nombre_pro, detalle, precio_pro, categorias_idcategoria, img, cod) 
VALUES ('$idproducto', '$nombre_pro', '$detalle', '$precio_pro', '$categorias_idcategoria', '$img', '$cod')";

if (mysqli_query($conexion, $stmt)) {
    echo "Producto agregado correctamente";
} else {
    echo "Error al agregar producto: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>