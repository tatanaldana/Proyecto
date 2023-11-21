<?php
session_start();


require_once("conexion.php");


$usar_db = new DBControl();

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
        require_once '../includeUsuario/funciones.php';
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
                        <th style="width:10%"><a href="../view/categorias/categoriasuser.php?accion=eliminar&eliminarcode=">Regresar</a></th>
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
                        <td><a href="../view/user/pagos/pagodatos.php">Pagar</a></td>
                    </tr>
                </table>

            <?php
            }
            ?>
            <a href="javascript:history.back(1)"><button type="button" class="btn regular-button" style="background: var(--primario); color: white;">Regresar</button></a>
        </div>
    </center>

 
    <br><br><br><br><br><br><br>
    <?php
        incluirTemplate('footer');
    ?>
</body>

</html>