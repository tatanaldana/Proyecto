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

        require '../datos.php' ;
?>


<body >

    <div class="progress-bar">
        <div class="stage">
          <div class="stage-icon">
            <span class="stage-number">1</span>
          </div>
          <div class="stage-description">Información</div>
        </div>
        <div class="stage">
          <div class="stage-icon">
            <span class="stage-number">2</span>
          </div>
          <div class="stage-description">Dirección de envío</div>
        </div>
        <div class="stage">
          <div class="stage-icon">
            <span class="stage-number">3</span>
          </div>
          <div class="stage-description">Forma de pago</div>
        </div>
        <div class="stage active">
          <div class="stage-icon">
            <span class="stage-number">4</span>
          </div>
          <div class="stage-description">Revisión y Aprobación</div>
        </div>
      </div>
    <section>
        <div class="checkout container">
            <form action="pedido.php" method="POST">
            <div class="sec1">
                <fieldset>
                    <legend class="titulo-check">Tus Datos</legend>

                    <?php 
                    echo 
                    "
                    <p>Nombre(s): " . $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] . "</p>
                    <p>Correo:" . $_SESSION['email'] ." </p>
                    <p>Telefono: ". $_SESSION['tel'] ." </p>
                    "
                    ?>

                </fieldset>
            </div>

            <div class="sec1" >
                <fieldset>
                    <legend class="titulo-check">Modo de Entrega</legend>
                    <label for="">
                        <input type="radio" name="domicilio" disabled> <p> A domicilio.</p>
                    </label>
                    <p><font color="silver"><?php echo $_SESSION['direccion']?> </font></p>
                    <label for="">
                        <input type="radio" name="domicilio" checked disabled> <p> Entrega en tienda. </p>
                    </label>
                </fieldset>
            </div>
            <div class="sec1">
                <fieldset>
                    <legend class="titulo-check">Modo de Pago</legend>
                    <?php

                    if(isset($_POST['metodo_pago'])){
                       echo $_POST['metodo_pago'];

                    };
   
                   
                        
                        
                        
                    ?>
                    
                </fieldset>
            </div>
            <a href="confirmar_pago.html"><input type="submit" value="Continuar" class="btn regular-button"></a>
        </div>
        <?php
            echo '<pre>';
            var_dump($_POST['metodo_pago']);
            echo '<pre>';
        ?>
        </form>
    </section>

</html>
</body>

<br><br><br><br><br><br><br>
    <?php 
   incluirTemplate('footer');
?>

</html>
