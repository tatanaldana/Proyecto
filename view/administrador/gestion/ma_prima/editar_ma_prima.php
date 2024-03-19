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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
    <body>
        <div class="caja_popup2" id="formmodificar">
            <form method="POST" class="contenedor_popup" >
                <div class="container">
                <div class="d-flex justify-content-center">
                <div class="row">
                <div class="col-md-12 table-responsive" >
                    <table class="table table-bordered border-primary table-striped" style="text-align:center" >
                    <tbody>
                        <tr>
                            <th colspan="2">Modificar materia Prima</th>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td><input type="hidden" name="cod_materia_pri"  value="<?php echo $codigo;?>" required></td>
                        </tr>
                        
                        <tr>
                            <td>Referencia</td>
                            <td><input type="text" name="referencia"  value="<?php echo $referencia;?>" required></td>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td><input type="text" name="descripcion"  value="<?php echo $descripcion;?>" required></td>
                        </tr>
                        
                        <tr>
                            <td>Existencia</td>
                            <td><input type="number" name="existencia" value="<?php echo $existencia;?>" required></td>
                        </tr>
                        <tr>
                            <td>Entrada</td>
                            <td><input type="number" name="entrada" value="<?php echo $entrada;?>" required></td>
                        </tr>
                        <tr>
                            <td>Salida</td>
                            <td><input type="number" name="salida" value="<?php echo $salida;?>" required></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td><input type="number" name="stock" value="<?php echo $stock;?>" required></td>
                        </tr>
                        
                        <td colspan="2">
                            <a href="../ma_prima.php" class="btn btn-primary">Cancelar</a>
                            <input type="submit" name="btnmodificar" class="btn btn-primary" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar  este producto?');">
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

<?php


if(isset($_POST['btnmodificar']))
{
    $codigo1 = $_POST['cod_materia_pri'];
    $referencia1 = $_POST['referencia'];
    $descripcion1 = $_POST['descripcion'];
    $existencia1 = $_POST['existencia'];
    $entrada1 = $_POST['entrada'];
    $salida1 = $_POST['salida'];
    $stock1 = $_POST['stock'];
    
    
    
   
    $querymodificar = mysqli_query($conexion, "UPDATE mat_pri SET referencia='$referencia1', descripcion='$descripcion1', existencia='$existencia1', entrada='$entrada1' , salida='$salida1', stock='$stock1'  WHERE cod_materia_pri =$codigo1");

    echo "<script>window.location= '../ma_prima.php' </script>";

}



?>