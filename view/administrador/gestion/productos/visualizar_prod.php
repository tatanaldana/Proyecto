<?php
include_once('../../crud/conexion.php');


if(isset($_GET['idproducto'])){
$codigo = $_GET['idproducto'];
}

$querybuscar = mysqli_query($conexion, "SELECT * FROM productos WHERE idProducto = '$codigo'");

while($mostrar = mysqli_fetch_array($querybuscar))
    {
        $idproducto = $mostrar['idProducto'];
        $nombre_pro = $mostrar['nombre_pro'];
        $detalle = $mostrar['detalle'];
        $precio_pro = $mostrar['precio_pro'];
        
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="..\css\bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="..\css\font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="..\css\sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="..\css\style.css">
  </head>
    <body>
        <div class="caja_popup2" id="formmodificar">
            <form method="POST" class="contenedor_popup" >
                <div class="container">
                <div class="d-flex justify-content-center">
                <div class="row">
                <div class="col-md-12 table-responsive" >
                    <table class="table table-bordered border-primary" style="text-align:center" >
                    <tbody>
                        <tr>
                            <th colspan="2">Datos del Producto</th>
                        </tr>
                        <tr>
                            <td>Id producto</td>
                            <td><input type="number" name="idproducto"  value="<?php echo $idproducto;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Nombre Producto</td>
                            <td><input type="text" name="nombre_pro"  value="<?php echo $nombre_pro;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Detalle</td>
                            <td><input type="text" name="detalle"  value="<?php echo $detalle;?>" disabled></td>
                        </tr>
                        
                        <tr>
                            <td>Precio Producto</td>
                            <td><input type="number" name="precio_pro" value="<?php echo $precio_pro;?>" disabled></td>
                        </tr>
                        

                        <td colspan="2">
                            <a href="../productos_adm.php" class="btn btn-primary">Cerrar</a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
                </div>
                </div>
            </form>
        </div>
    </body>
</html>