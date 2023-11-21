<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante La cabaña</title>

    <!-- bootstrap online -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Importamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="view/public/css/bootstrap.min.css">
    <!-- Font Awesome: para los iconos -->
    <link rel="stylesheet" href="view/public/css/font-awesome.min.css">
    <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
    <link rel="stylesheet" href="view/public/css/sweetalert.css">
    <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
    <link rel="stylesheet" href="view/public/css/style.css">
    <!-- Personalizado daniel  -->
    <link rel="stylesheet" href="view/public/css/stylesg.css" type="text/css" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

<?php

require 'view/includeUsuario/funciones.php';
    
    incluirTemplate('header')
?>



    <div class="imagenindex">

        <?php 
        if (isset($_SESSION['nombre'])){
            echo 'Bienvenido'. ' ' . ucfirst ($_SESSION['nombre'] );
        }else{
            echo 'Bienvenido';
        }
        ?>

        
    </div>



    <div class="barramenu">
        <nav class="menu-productos row">
            <a href="/Proyecto/carrito/catcombos.php" class="col-sm"> <img src="view/public/img/combo.png" alt="icono Combos">Combos </a>
            <a href="/Proyecto/carrito/catpizza.php" class="col-sm"> <img src="view/public/img/pizza.png" alt="icono Pizzas">Pizzas</a>
            <a href="/Proyecto/carrito/catpollo.php" class="col-sm"> <img src="view/public/img/pollo.png" alt="icono Pollos">Pollos</a>
            <a href="/Proyecto/carrito/catburguer.php" class="col-sm"> <img src="view/public/img/hamburguesa.png" alt="icono Pollos">Hamburguesas</a>
            <a href="/Proyecto/carrito/catespecialidades.php" class="col-sm"> <img src="view/public/img/especialidades.png" alt="icono Especiales">Especialidades</a>
            <a href="/Proyecto/carrito/catbebidas.php" class="col-sm"> <img src="view/public/img/bebida.png" alt="icono Bebidas">Bebidas</a>
        </nav>

    </div>

    <div class="container">

        <h1 class="center">Conocenos </h1>

        <div class="row align-items-center ">

            <div id="myCarousel" class="carousel slide col-md-auto" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner width:50% height:50%;">
                    <div class="item active">
                        <img src="view/public/img/Hamburguesas.jpg" alt="Los Angeles" style="width:100%;;">
                        <div class="carousel-caption">
                            <h3>Hamburguesa</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="/view/public/img/pollo.jpg" alt="Chicago" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Pollos Apanados</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="view/public/img/pizza.jpg" alt="New york" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Pizzas Especiales</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="col-sm-6">
                <h3 class="mt-0 center font-weight-bold " style="color:var(--primario); text-transform:uppercase;">Nuestros Productos</h3>

                <hr class="" style="color:var(--primario); " size="30px">
                <p>Contamos con los mejores estandares de calidad para traer a sus casas la mejor comida rapida que ustedes pueden degustar.
                    Nos aseguramos que nuestra materia prima sea de la mejor calidad para contar con su total confiabilidad y siempre seamos tu primera opcion. Te invitamos a Revisar nuestro menú en el siguiente link</p>


                <div class="center mt-3">
                    <a href="/Proyecto/view/categorias/categorias.php" class=""><img src="img/bandejacomida.png" alt="Imagen Bandeja Comida" style="width: 100px; height:100px;"><button type="buttom" class="btn regular-button" style="background: var(--primario); color: white;"> Continuar </button></a>
                </div>



            </div>

        </div>

    </div>
    </body>


    <br><br><br><br><br><br><br>
    <?php
        incluirTemplate('footer');
      //  prueba de pull 
    ?>
</html>

