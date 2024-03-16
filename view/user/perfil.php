<?php

session_start();

require_once("../../model/conexion.php");

$db = new Conexion();


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tu Perfil</title>
  
  <?php 
      include '../includeUsuario/head.php';
  ?>

</head>


<?php
require '../includeUsuario/funciones.php';
incluirTemplate('header')
?>

<body>

  <?php
    include "forms/form_perfil.php";
  ?>

  
  <script src="../public/js/jquery.js"></script>

<script src="../public/js/sweetalert.min.js"></script>
<!-- Js usuarios -->
<script src="../public/js/usuario.js"></script>
<!-- Js botones -->
<script src="../public/js/buttons.js"></script>
  </div>
</body>

<br><br><br><br><br><br><br>
<?php
incluirTemplate('footer');
?>


</html>