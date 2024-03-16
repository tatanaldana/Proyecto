<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="../public/css/bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="../public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="../public/css/styles.css">
  </head>
<body>
  <?php
    include 'include/header.php';

  ?> 
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
  </ol>
</nav>
   <?php
    include 'include/img_clientes.php';
    
    include 'forms/form_cliente.php';
     
  
    include 'include/img_menu.php';

    include 'include/footer.php';
  ?> 
  

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
</html>