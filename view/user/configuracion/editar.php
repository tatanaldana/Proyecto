<?php
// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] !=2){
    /* 
    para redireccionar en php se utiliza header
    pero al ser datos enviados por la cabecera debe esjecutarse
    antes de mostrar cualquier informcaionen DOM es por eso que coloco
    el codigo antes de la estructura del html 
    */
    header('location: ../../login.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Actualizacion Perfil</title>
        <?php
            include '../../includeUsuario/head.php';
        ?>
    </head>

    <?php 
    
     require_once '../../includeUsuario/funciones.php'; 
      incluirTemplate('header')
    ?>

<body>
        <?php
            include('../forms/form_editar_perfil.php')

        ?>

<script>
    

</script>
  
<script src="../../public/js/jquery.js"></script>

<script src="../../public/js/sweetalert.min.js"></script>

<script src="../../public/js/usuario.js"></script>

<!-- Js botones -->
<script src="../../public/js/buttons.js"></script>




</body>



<br><br><br><br><br><br><br>
    <?php 

       incluirTemplate('footer')

?>




</html>