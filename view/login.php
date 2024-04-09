<?php

/* vamor a crear un login que revise si el usuario esta registrado y
cuando inicie sesion lo redireccione a rol correspondiente 
*/


session_start();

// isset verifica si existe una varible 
if(isset($_SESSION['doc'])){
    header('location: ../controller/usuario/redirec.php');
  }

?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="public/css/styles.css">
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

  <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
          <div class="spacing-1"></div>
            <fieldset>
              <form id=formlogin>
                <div class="wrapper">
                  <div class="logo">
                      <img src="/Proyecto/view/public/img/logo.jpg" alt="">
                  </div>
                  <div class="my-5"></div>
                  <div class="text-center mt-4 name">
                      Login
                  </div>
                  <div class="my-5"></div>
                  <form class="p-3 mt-3">
                      <div class="form-field d-flex align-items-center">
                          <span class="far fa-user"></span>
                          <input type="text" name="user" id="user" placeholder="Ingresa tu usuario">
                      </div>
                      <div class="form-field d-flex align-items-center">
                          <div class="input-group-addon">
                <p class="fa fa-eye-slash" id="ojo" onclick="showPassword()"></p>
                <p class="fa fa-eye" style="display: none;" id="ojoabierto" onclick="showPassword()"></p>
              </div>
                          <input type="password" name="password" autocomplete="off" id="clave" placeholder="Ingresa tu contraseña">
                      </div>
                      <button type="button" class="btn btn-primary btn-block" name="button" id="login">Iniciar sesion</button>
                      
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
                      <div class="my-5"></div>
                      <div class="text-center fs-6">
                      <a href="#">¿Olvidaste tu contraseña?</a> 
                      <br>o<br>
                      <a href="registro.php"> Registrate!</a>
                  </div>
              </form>
            </fieldset>  
        </div>
      </div>
  </div>
 
<!-- Final formulario login -->

 <!-- Jquery -->
 <script src="public/js/jquery.js"></script>
    <!-- SweetAlert js -->
    <script src="public/js/sweetalert.min.js"></script>
    <!-- Js personalizado -->
    <script src="public/js/usuario.js"></script>
    <!-- Js personalizado -->
    <script src="public/js/funcion.js"></script>
  </body>


  <br><br><br><br><br><br><br>
  <?php
        incluirTemplate('footer');
    ?>

</html>




