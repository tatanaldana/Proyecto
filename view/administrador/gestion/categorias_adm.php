<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador - Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="..\css\bootstrap.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="..\css\font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="..\css\sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="..\css\style.css">
    

    <script type="text/javascript">
    
    </script>
  </head>
  <body>

  <?php
    include '../crud/conexion.php';

    include '../include/header.php';

  
  ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="../gestion.php">Gestion</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
  </ol>
</nav>



  <?php 

     include '../forms/form_cat.php';

     include '../gestion/categorias/tabla_cat.php';
   
     include '../gestion/categorias/botones_cat.php';     
      
    include '../include/img_menu.php';

    include '../include/footer.php';
  ?> 

    </body>
</html>