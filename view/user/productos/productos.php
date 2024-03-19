<?php 

// pagina con todas la propiedades de administrador del software

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <title>Categorias</title>
    <?php
        include '../../includeUsuario/head.php';
    ?>
    

  
</head>

    <?php
    
        require_once '../../includeUsuario/funciones.php';
        // require_once '../../../controller/productos/todoProductos.php';
        incluirTemplate('header');


    ?>

  <body>

  <div class="titulo-producto" id="titulo-producto"></div>


    <main class="container">

      <div class="listado-productos" id="listado-productos"></div>

    </main>
  
    
  </body>


    
<br><br><br><br><br><br><br>
    <?php
    
        incluirTemplate('footer');
    ?>


<script src="../../public/js/cate&Prod.js"></script>

</html>
