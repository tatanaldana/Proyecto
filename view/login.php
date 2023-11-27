<?php

/* vamor a crear un login que revise si el usuario esta registrado y
cuando inicie sesion lo redireccione a rol correspondiente 
*/


session_start();

// isset verifica si existe una varible 
if(isset($_SESSION['doc'])){
    header('location: ../../controller/redirec.php');
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php 
        include 'includeUsuario/head.php';
    ?>
  </head>

  <?php
        require "includeUsuario/funciones.php";
        incluirTemplate('header')
    ?>

  <body>

  <!-- 
    Las clases que se utlizan y los divs son de Bootstrap
-->

<!-- Formulario Login -->
<div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          <!-- Margen superior (css personalizado )-->
          <div class="spacing-1"></div>

          <!-- Estructura del formulario -->
          <fieldset>

            <legend class="center">Login</legend>

            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Usuario</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" id="user" placeholder="Ingresa tu usuario">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la clave-->
            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="password" autocomplete="off" class="form-control" id="clave" placeholder="Ingresa tu usuario">
            </div>

            <!-- Animacion de load ( Solo es visible cuando el usuario espera respuesta del servidor) --> 
            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="public/img/load.gif" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Validando información...</span>
              </div>
            </div>
            <!-- Fin load -->

            <!-- Boton Login para activar la funcion click y enviar los datos mediante ajax --> 
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>

                <button type="button" class="btn btn-primary btn-block" name="button" id="login">Iniciar sesion</button>
                
              </div>
            </div>

            <section class="text-accent center">
              <div class="spacing-2"></div>
              
              <p>
                No tienes una cuenta? <a href="registro.php"> Registrate!</a>
              </p>
            </section>

          </fieldset>
        </div>
      </div>
    </div>

<!-- Final formulario login -->

 <!-- Jquery -->
 <script src="public/js/jquery.js"></script>
    <!-- Bootstrap js -->
    <script src="public/js/bootstrap.min.js"></script>
    <!-- SweetAlert js -->
    <script src="public/js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="public/js/usuario.js"></script>
  </body>


  <br><br><br><br><br><br><br>
  <?php
        incluirTemplate('footer');
    ?>

</html>




