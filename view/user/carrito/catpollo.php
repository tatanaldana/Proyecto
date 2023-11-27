<?php
session_start();

require_once("../../../model/conexion.php");

$usar_db = new Conexion();
$usar_db->conexion();
$usar_db->set_names();

?>



<html>
<meta charset="UTF-8">

<head>
    <title>La cabaña</title>

    <?php
        include '../../includeUsuario/head.php';
    ?>

</head>

<?php
        require '../../includeUsuario/funciones.php';
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
                
                "SELECT * FROM productos INNER JOIN categorias ON  categorias_idcategoria = id_categoria WHERE id_categoria = '1' ");
                // "SELECT * FROM categorias WHERE id_categoria = '2' ORDER BY id_categoria ASC"

            if (!empty($productos_array)) {
                foreach ($productos_array as $i => $k) {
            ?>
                    <div class="contenedor_productos">
                        <form method="POST" action="carrito.php?accion=agregar&cod=<?php echo $productos_array[$i]["cod"]; ?>">
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
                    <?php
                }
                }else{
                    echo '<div class="pantallaerror">';
                    echo ' <img src="../../public/img/Error.png" alt="Imagen de error" class>';
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