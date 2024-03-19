<?php 

// pagina con todas la propiedades de administrador del software

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <?php
        include '../../includeUsuario/head.php';
    ?>
</head>

    <?php
        require_once '../../includeUsuario/funciones.php';
        incluirTemplate('header');
    ?>
<body>


<div class="imagenindex">

<h1>Categorias</h1>

</div>

    <main class="container">
        <div class="listado-categorias" id="listado-categorias"></div>
    </main>

<br><br><br><br><br><br><br>

<script src="../../public/js/cate&Prod.js"></script>

    <?php
        

        incluirTemplate('footer');
    ?>

</html>