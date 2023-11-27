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
    <?php
          include '../includeUsuario/head.php';
      ?>    
    
</head>

</head>

<?php
        require '../../includeUsuario/funciones.php';
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
                        <input type="radio" name="metodo_pago" value= "tarjeta" required> <p> Terjeta Debito / Crédito </p>
                    </label>
                    <label for="plataforma">
                        <input type="radio" name="metodo_pago" value= "plataforma" required><p> Nequi o Daviplata</p>
                    </label>
                    <label for="efectivo">
                        <input type="radio" name="metodo_pago" value= "efectivo" required><p> Efectivo.</p>
                    </label>
            </fieldset>            

            <input type="submit" value="Continuar" class= "campo-obligatorio">
        </form>

    </div>
</div>
</body>

<script src="../js/app1.js" type="text/javascript"></script>
<br><br><br><br><br><br><br>
    <?php 
   incluirTemplate('footer');
?>

</html>
