<?php
session_start();


require_once("../../../model/conexion.php");


$usar_db = new Conexion();
$usar_db->conexion();
$usar_db->set_names();

if (!empty($_GET["accion"])) {
    switch ($_GET["accion"]) {
        case "agregar":
            if (!empty($_POST["txtcantidad"])) {
                $codproducto = $usar_db->larauseQuery("SELECT * FROM productos WHERE cod='" . $_GET["cod"] . "'");
                $items_array = array($codproducto[0]["cod"] => array(
                    'larause_nom'        => $codproducto[0]["nombre_pro"],
                    'larause_cod'        => $codproducto[0]["cod"],
                    'txtcantidad'        => $_POST["txtcantidad"],
                    'larause_pre'        => $codproducto[0]["precio_pro"],
                    'larause_img'        => $codproducto[0]["img"]
                ));

                if (!empty($_SESSION["items_carrito"])) {
                    if (in_array(
                        $codproducto[0]["cod"],
                        array_keys($_SESSION["items_carrito"])
                    )) {
                        foreach ($_SESSION["items_carrito"] as $i => $j) {
                            if ($codproducto[0]["cod"] == $i) {
                                if (empty($_SESSION["items_carrito"][$i]["txtcantidad"])) {
                                    $_SESSION["items_carrito"][$i]["txtcantidad"] = 0;
                                }
                                $_SESSION["items_carrito"][$i]["txtcantidad"] += $_POST["txtcantidad"];
                            }
                        }
                    } else {
                        $_SESSION["items_carrito"] = array_merge($_SESSION["items_carrito"], $items_array);
                    }
                } else {
                    $_SESSION["items_carrito"] = $items_array;
                }
            }
            break;
        case "eliminar":
            if (!empty($_SESSION["items_carrito"])) {
                foreach ($_SESSION["items_carrito"] as $i => $j) {
                    if ($_GET["eliminarcode"] == $i) {
                        unset($_SESSION["items_carrito"][$i]);
                    }
                    if (empty($_SESSION["items_carrito"])) {
                        unset($_SESSION["items_carrito"]);
                    }
                }
            }
            break;
        case "vacio":
            unset($_SESSION["items_carrito"]);
            break;
        case "pagar":
            echo "<script> alert('Gracias por su compra - larause');window.location= 'index.php' </script>";
            unset($_SESSION["items_carrito"]);

            break;
    }
}
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
        require_once '../../includeUsuario/funciones.php';
        incluirTemplate('header');
    ?>

<body>


    <center>

        <div align="center">
            <h1>Carrito de compras</h1>
        </div>

        <div>
            <div>
                <h2>Lista de productos a comprar.</h2>
            </div>

            <?php
            if (isset($_SESSION["items_carrito"])) {
                $totcantidad = 0;
                $totprecio = 0;
            ?>

                <table border="2px">
                    <tr>
                        <th style="width:30%">Descripción</th>
                        <th style="width:10%">Código</th>
                        <th style="width:10%">Cantidad</th>
                        <th style="width:10%">Precio x unidad</th>
                        <th style="width:10%">Precio</th>
                        <th style="width:10%"><a href="../categorias/categoriasuser.php?accion=eliminar&eliminarcode=">Regresar</a></th>
                    </tr>
                    <?php

                    foreach ($_SESSION["items_carrito"] as $item) {
                        $item_price = $item["txtcantidad"] * $item["larause_pre"];
                    ?>
                        <tr>
                            <td><img src="<?php echo $item["larause_img"]; ?>" class="imagen_peque" /><?php echo $item["larause_nom"]; ?></td>
                            <td><?php echo $item["larause_cod"]; ?></td>
                            <td><?php echo $item["txtcantidad"]; ?></td>
                            <td><?php echo "$ " . $item["larause_pre"]; ?></td>
                            <td><?php echo "$ " . number_format($item_price, 2); ?></td>
                            <td><a href="carrito.php?accion=eliminar&eliminarcode=<?php echo $item["larause_cod"]; ?>">Eliminar</a></td>
                        </tr>
                    <?php
                        $totcantidad += $item["txtcantidad"];
                        $totprecio += ($item["larause_pre"] * $item["txtcantidad"]);
                    }
                    ?>

                    <tr style="background-color:red">
                        <td colspan="2"><b>Total de productos:</b></td>
                        <td><b><?php echo $totcantidad; ?></b></td>
                        <td colspan="2"><strong><?php echo "$ " . number_format($totprecio, 2); ?></strong></td>
                        <?php
                        if(!isset($_SESSION['nombre'])){
                        echo
                        '<td><a href="../../login.php">Pagar</a></td>';
                        
                        }else{
                            echo
                            '<td><a href="../pagos/pagodatos.php">Pagar</a></td>';
                        }
                        ?>
                        
                        
                    </tr>
                </table>

            <?php
            }


            if(!isset($_SESSION['nombre'])){
            echo
                '<a href="../../../index.php"><button type="button" class="btn regular-button" style="background: var(--primario); color: white;">Regresar</button></a>';
            }else{

                echo

                '<a href="../index.php"><button type="button" class="btn regular-button" style="background: var(--primario); color: white;">Regresar</button></a>';
            }
            ?>

            
            
        </div>
    </center>

 
    <br><br><br><br><br><br><br>
    <?php
        incluirTemplate('footer');
    ?>
</body>

</html>