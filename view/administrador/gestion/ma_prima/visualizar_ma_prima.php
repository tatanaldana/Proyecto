<?php
include_once('../../crud/conexion.php');



if(isset($_GET['doc_materia_pri'])){
$codigo = $_GET['doc_materia_pri'];
}

$querybuscar = mysqli_query($conexion, "SELECT * FROM mat_pri WHERE cod_materia_pri = '$codigo'");

while($mostrar = mysqli_fetch_array($querybuscar))
    {
        $codigo = $mostrar['cod_materia_pri'];
        $referencia = $mostrar['referencia'];
        $descripcion = $mostrar['descripcion'];
        $existencia = $mostrar['existencia'];
        $entrada = $mostrar['entrada'];
        $salida = $mostrar['salida'];
        $stock = $mostrar['stock'];
        
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
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
                            <td>Id </td>
                            <td><input type="number" name="cod_materia_pri"  value="<?php echo $codigo;?>" disabled></td>
                        </tr>
                        
                        <tr>
                            <td>Referencia</td>
                            <td><input type="text" name="referencia"  value="<?php echo $referencia;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td><input type="text" name="descripcion"  value="<?php echo $descripcion;?>" disabled></td>
                        </tr>
                        
                        <tr>
                            <td>Existencia</td>
                            <td><input type="number" name="existencia" value="<?php echo $existencia;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Entrada</td>
                            <td><input type="number" name="entrada" value="<?php echo $entrada;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Salida</td>
                            <td><input type="number" name="salida" value="<?php echo $salida;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><input type="number" name="stock" value="<?php echo $stock;?>" disabled></td>
                        </tr>
                        

                        <td colspan="2">
                            <a href="../ma_prima.php" class="btn btn-primary">Cerrar</a>
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