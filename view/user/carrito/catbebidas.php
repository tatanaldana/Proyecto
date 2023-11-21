<?php
session_start();

require_once("conexion.php");

$usar_db = new DBControl();
?>



<html>
<meta charset="UTF-8">

<head>
    <title>La cabaña</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="/Proyecto/css/bootstrap.min.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="/Proyecto/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="/Proyecto/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="/Proyecto/css/style.css">
    <!-- Personalizado daniel  -->
    <link href="/Proyecto/css/stylesg.css" rel="stylesheet" type="text/css" media="all">
</head>

<?php
        require '../includeUsuario/funciones.php';
        incluirTemplate('header')
?>

<body>



    <div>
        <div>
            <h1 class="center" style="color:var(--primario) ;">Productos</h1>
        </div> 

        <div class="container">
            <?php

            // $daed = "SELECT * FROM categorias INNER JOIN productos ON  productos.idProductos = categorias.productId ";

            /*Larause*/
            $productos_array = $usar_db->larausequery(
                
                "SELECT * FROM productos INNER JOIN categorias ON  categorias_idcategoria = id_categoria WHERE id_categoria = '6' ");
                // "SELECT * FROM categorias WHERE id_categoria = '2' ORDER BY id_categoria ASC"

            if (!empty($productos_array)) {
                foreach ($productos_array as $i => $k) {
                    
            ?>
                    <div class="contenedor_productos">

                        <form method="POST" action="carrito.php?accion=agregar&cod=
<?php echo $productos_array[$i]["cod"]; ?>">
                            <div><img src="<?php echo $productos_array[$i]["img"]; ?>"></div>
                            <div>
                                <div style="padding-top:20px;font-size:18px;"><?php echo $productos_array[$i]["nombre_pro"]; ?></div>
                                <div style="padding-top:10px;font-size:20px;"><?php echo "$" . $productos_array[$i]["precio_pro"]; ?></div>
                                <div class="d-flex flex-column align-items-center">
                                    <input type="text" name="txtcantidad" value="1" size="1" class="mb-2" />
                                    <input type="submit" value="Agregar" style="background: var(--primario); color: white; border:none; padding:10px; width:100%;" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <a href="javascript:history.back(1)"><button type="button" class="btn regular-button" style="background: var(--primario); color: white;">Regresar</button></a>
            <?php
                }
                }else{
                    echo '<div class="pantallaerror">';
                    echo ' <img src="../img/Error.png" alt="Imagen de error" class>';
                    echo '<h1>Lo sentimos, no encontramos resultados de su busqueda</h1>';
                    echo '</div>';
    
                }
      
            ?>
        </div>

        <div class="center">
            <a href="javascript:history.back(1)"><button type="button" class="btn regular-button" style="background: var(--primario); color: white;">Regresar</button></a>
        </div>

</body>

<br><br><br><br><br><br><br>
    
    <?php
        incluirTemplate('footer');
    ?>

</html>