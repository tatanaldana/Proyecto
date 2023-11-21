<?php

// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2) {
    /* 
    para redireccionar en php se utiliza header
    pero al ser datos enviados por la cabecera debe esjecutarse
    antes de mostrar cualquier informcaionen DOM es por eso que coloco
    el codigo antes de la estructura del html 
    */
    header('location: ../login.php');
}

?>

<!DOCTYPE html>
<html lang="es">


    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Restaurante La cabaña</title>

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>

    <?php
        require_once '../funciones.php'; 
        incluirTemplate('header')
    ?>



    <div class="container">
        <div class="center mb-6">
            <?php
            require_once '/apache/htdocs/Proyecto/view/conexion/conexion.php';

            $buscar = $_POST['textbuscar'];

            $queryusuarios = mysqli_query($conexion, "SELECT * FROM productos WHERE nombre_pro like '" . $buscar . "%'");
            if ($queryusuarios->num_rows > 0) {

                while ($mostrar = mysqli_fetch_array($queryusuarios)) {

                    $mostrar["img"];
                    $mostrar["nombre_pro"];
                    $mostrar["precio_pro"];

            ?>
                    <div class="contenedor_productos">
                        <div><img src="<?php echo $mostrar["img"]; ?>"></div>
                        <div>
                            <form action="/Proyecto/carrito/carrito.php">
                                <div style="padding-top:20px;font-size:18px;"><?php echo $mostrar["nombre_pro"]; ?></div>
                                <div style="padding-top:10px;font-size:20px;"><?php echo "$" . $mostrar["precio_pro"]; ?></div>
                                <div class="d-flex flex-column align-items-center">
                                    <input type="text" name="txtcantidad" value="1" size="1" class="mb-2" />
                                    <input type="submit" value="Agregar" style="background: var(--primario); color: white; border:none; padding:10px; width:100%;" />
                            </form>
                        </div>
                    </div>
        </div>



<?php
                }
            } else {
                echo '<div class="pantallaerror">';
                echo "<img src='/Proyecto/img/Error.png' alt='Imagen de error' style = 'width: 300px; height: 300px;' class = 'center'>
                <h2>Lo sentimos, no encontramos Nada relacionado con tu busqueda</h2>";
                echo '</div>';
            }
?>

    </div>
    </div>
    <div class="center">
        <a href="javascript:history.back(1)"><button type="button" class="btn regular-button" style="background: var(--primario); color: white;">Regresar</button></a>
    </div>



<br><br><br><br><br><br><br>
    <?php
        incluirTemplate('footer')
    ?>

