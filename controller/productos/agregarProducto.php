<?php

// $daed = "SELECT * FROM categorias INNER JOIN productos ON  productos.idProductos = categorias.productId ";

/*Larause*/
$productos_array = $usar_db->larausequery(
    
    "SELECT * FROM productos INNER JOIN categorias ON  categorias_idcategoria = id_categoria WHERE id_categoria = '5' ");
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
        <?php
    }
    }else{
        echo '<div class="pantallaerror">';
        echo ' <img src="../../public/img/" alt="Imagen de error" class>';
        echo '<h1>Lo sentimos, no encontramos resultados de su busqueda</h1>';
        echo '</div>';

    }

?>