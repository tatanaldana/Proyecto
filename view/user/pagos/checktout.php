<?php
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] !=2){
    /* 
    para redireccionar en php se utiliza header
    pero al ser datos enviados por la cabecera debe esjecutarse
    antes de mostrar cualquier informcaionen DOM es por eso que coloco
    el codigo antes de la estructura del html 
    */
    header('location: ../login.php');
}


require_once("../../../model/conexion.php");

$db = new Conexion();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion Datos</title>
    <head>
    <?php
        include '../../includeUsuario/head.php';
    ?>
    </head>
    
</head>

</head>

  <?php
    require '../../includeUsuario/funciones.php';
    incluirTemplate('header');
  ?>


<body>
  <?php
    include '../forms/form_checkout.php'
  ?>

</body>

<script src="../../public/js/jquery.js"></script>

<script src="../../public/js/sweetalert.min.js"></script>
<!-- Js usuarios -->
<script src="../../public/js/usuario.js"></script>
<!-- Js botones -->
<script src="../../public/js/buttons.js"></script>

<script src="../../public/js/dates.js"></script>

<br><br><br><br><br><br><br>
    <?php 
   incluirTemplate('footer');
?>

</html>


