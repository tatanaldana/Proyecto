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

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion Datos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <!-- Importamos los estilos de Bootstrap -->
       <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <!-- Font Awesome: para los iconos -->
        <link rel="stylesheet" href="../../../css/font-awesome.min.css">
        <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
        <link rel="stylesheet" href="../../../css/sweetalert.css">
        <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
        <link rel="stylesheet" href="../../../css/style.css">
        <!-- Personalizado daniel  -->
        <link href="../../../css/stylesg.css" rel="stylesheet" type="text/css" media="all">
    
</head>

</head>

<?php
        require '../../../includeUsuario/funciones.php';
        incluirTemplate('header');

        require '../datos.php' ;
?>


<body>

<div class="container mt-4">
    <div class="metodo_pago">

        <form action="checktout.php" method= "post">
            <fieldset>
                <legend class="titulo-check">Modo de Pago</legend>
                    <label for="tarjeta">
                        <input type="radio" name="metodo_pago" value= "tarjeta"> <p> Terjeta Debito / Crédito </p>
                    </label>
                    <label for="plataforma">
                        <input type="radio" name="metodo_pago" value= "plataforma"><p> Nequi o Daviplata</p>
                    </label>
                    <label for="efectivo">
                        <input type="radio" name="metodo_pago" value= "efectivo"><p> Efectivo.</p>
                    </label>
            </fieldset>

            <input type="submit" value="Continuar">.

        <?php
        ?>
        </form>

    </div>
</div>
</body>

<br><br><br><br><br><br><br>
    <?php 
   incluirTemplate('footer');
?>

</html>
