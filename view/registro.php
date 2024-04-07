<?php

/* 
En ocaciones el usuario puede volver al login
aun si ya exixte una sesion iniciada lo correcto
es no mostrar otra vez el login sino redireccionarlo
a su pagina principal mientras exista un sesion entonces 
creamos un archivo que controle el redireccionamiento
*/

session_start();

// isset verifica si existe una variable
if (isset($_SESSION['doc'])) {
  header('location: Proyecto/controller/usuario/redirec.php');
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
require_once 'includeUsuario/funciones.php';
incluirTemplate('header');


?>



<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-4 col-md-offset-4">
      <div class="form-body">
        <div class="form-holder">
          <div class="form-content">
            <div class="form-items">
              <h3>Registrate hoy</h3>
              <p>Diligencia los datos</p>
                <form id="formulario_registro" novalidate>

                  <div class="col-md-12">
                    <input class="form-control" type="text" name="nombre" placeholder="Ingresa tus nombres" required>
                  </div>

                  <div class="col-md-12">
                    <input class="form-control" type="text" name="apellido" placeholder="Ingresa tus apellidos" required>
                  </div>

                  <div class="col-md-12">
                    <input class="form-control" type="date"  name="fecha_naci" required>
                  </div>

                  <div class="col-md-12">
                    <select name="tipo_doc" id="tipo_doc" class="form-select mt-3" required>
                      <option value="CC">Cedula de ciudadania</option>
                      <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                      <option value="CE">Cedula de extranejeria</option>
                    </select>
                  </div>

                  <div class="col-md-12">
                    <input class="form-control" type="number" name="doc" placeholder="Ingrese su documento de identidad" required>
                  </div>

                  <div class="col-md-12">
                    <input class="form-control" type="email" name="email" placeholder="Ingrese su correo electronico" required>
                  </div>

                  <div class="col-md-12">
                    <input class="form-control" type="text" name="direccion" placeholder="Ingrese su direccion" required>
                  </div>

                  <div class="col-md-12">
                    <input class="form-control" type="tel" name="tel" placeholder="Ingrese su telefono" required>
                  </div>

                  <div class="col-md-12">
                    <select name="genero" id="genero" class="form-select mt-3" required>
                      <option value="hombre">Hombre</option>
                      <option value="mujer">Mujer</option>
                      <option value="otro">Otro</option>
                    </select>
                  </div>

                  <div class="col-md-12">
                    <input class="form-control" type="password" name="clave" placeholder="Ingrese su contraseña" autocomplete="new-password" required>
                  </div>

                  <div class="col-md-12">
                  <input class="form-control" type="password" name="clave2" placeholder="Confirme su contraseña" autocomplete="new-password" required>
                  </div>
                  <div class="row" id="load" hidden="hidden">
                    <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                      <img src="public/img/load.gif" width="100%" alt="">
                    </div>
                    <div class="col-xs-12 center text-accent">
                      <span>Validando información...</span>
                    </div>
                  </div>
                  <div class="my-5"></div>
                  <div class="form-button mt-3">
                    <button type="button" class="btn btn-primary btn-block" name="button" id="registro">Registrate</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<</div>    
  <!-- Final formulario login -->

  <!-- Jquery -->
  <script src="public/js/jquery.js"></script>
  <!-- SweetAlert js -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Js personalizado -->
  <script src="public/js/usuario.js"></script>
</body>

<br><br><br><br><br><br><br>
<?php
incluirTemplate('footer');
?>

</html>