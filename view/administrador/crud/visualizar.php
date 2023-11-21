<?php
include_once('..\crud\conexion.php');

if(isset($_GET['doc'])){
$codigo = $_GET['doc'];
}

$querybuscar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE doc = '$codigo'");

while($mostrar = mysqli_fetch_array($querybuscar))
    {
        $codigo = $mostrar['doc'];
        $nombre = $mostrar['nombre'];
        $apellido = $mostrar['apellido'];
        $telefono = $mostrar['tel'];
        $correo = $mostrar['email'];
        $genero = $mostrar['genero'];
        $fecha=  $mostrar['fecha_naci'];
        $direccion = $mostrar['direccion'];
        
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
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
                            <th colspan="2">Datos del cliente</th>
                        </tr>
                        <tr>
                            <td>Cedula</td>
                            <td><input type="number" name="cedula"  value="<?php echo $codigo;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Nombres</td>
                            <td><input type="text" name="nombre" value="<?php echo $nombre;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Apellidos</td>
                            <td><input type="text" name="apellido" value="<?php echo $apellido;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type="number" name="telefono" value="<?php echo $telefono;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Correo</td>
                            <td><input type="e-mail" name="correo" value="<?php echo $correo;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Direccion</td>
                            <td><input type="text" name="direccion" value="<?php echo $direccion;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Genero</td>
                            <td><input type="text" name="genero" value="<?php echo $genero;?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Fecha de nacimiento</td>
                            <td><input type="date" name="fecha" value="<?php echo $fecha;?>" disabled></td>
                        </tr>
                        <td colspan="2">
                            <a href="..\clientes.php" class="btn btn-primary">Cerrar</a>
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