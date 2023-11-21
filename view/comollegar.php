<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante La cabaña</title>

    <!-- bootstrap online -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="/Proyecto/css/bootstrap.min.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="/Proyecto/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="/Proyecto/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="/Proyecto/css/style.css">
    <!-- Personalizado daniel  -->
    <link rel="stylesheet" href="/Proyecto/css/stylesg.css" type="text/css" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

<?php
        require 'includeUsuario/funciones.php';
        incluirTemplate('header')
    ?>



<div class="imagenindex">

<h1>Comidas Rapidas La Cabaña</h1>

</div>


<br><br>
<div class="center col-sm-12">
                <h2 class="mt-0 center font-weight-bold " style="color:var(--white); text-transform:uppercase; background-color: #FD2626">Nuestra Ubicacion</h2>

                <hr class="" style="color:var(--primario); " size="30px">
                <h3>Nuestro establecimiento está ubicado en el corazón de la ciudad</h3>


                <div class="center mt-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d383.32454765992924!2d-74.10979097342707!3d4.614864098355653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1685596136444!5m2!1ses!2sco" width="100%" height="300"frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>  
                </div>
                



    </body>

    <br><br><br><br><br><br><br>
    <?php
        incluirTemplate('footer');
    ?>

</html>