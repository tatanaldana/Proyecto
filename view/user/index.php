<?php

// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if (!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2) {
    /* 
    para redireccionar en php se utiliza header
    pero al ser datos enviados por la cabecera debe esjecutarse
    antes de mostrar cualquier informcaionen DOM es por eso que coloco
    el codigo antes de la estructura del html 
    */
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante La cabaña</title>

    <?php
    include '../includeUsuario/head.php';
    ?>
</head>

<script src="../public/js/categorias.js"></script>
<script src="../public/js/productos.js"></script>


<?php
require '../includeUsuario/funciones.php';
incluirTemplate('header');
?>

<body>



    <div class="imagenindex">
        <p>Bienvenido <?php echo  ucfirst($_SESSION['nombre']) ?></p>
    </div>
    <div class="barramenu">

        <div class="listado-categorias-index " id="listado-categorias-index"></div>
    </div>


    <div class="container">

        <h1 class="center">Conocenos 👌 </h1>

        <div class="row align-items-center ">

            <div id="myCarousel" class="carousel slide col-md-auto" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner width:50% height:50%;">
                    <div class="item active" style="background-color:#FD2626;">
                        <img src="../../view/public/img/iconosCategorias/cathambur.png" alt="Los Angeles" style="width:50%;;">
                        <div class="carousel-caption" style="color: #ffffff;">
                            <h3>Hamburguesas</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>

                    <div class="item" style="background-color:#FD2626;">
                        <img src="../../view/public/img/iconosCategorias/catpollo.png" alt="Chicago" style="width:50%;">
                        <div class="carousel-caption" style="color: #ffffff;">
                            <h3>Pollos Apanados</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>

                    <div class="item" style="background-color:#FD2626;">
                        <img src="../../view/public/img/iconosCategorias/catpizza.png" alt="New york" style="width:50%;">
                        <div class="carousel-caption" style="color: #ffffff;">
                            <h3>Pizzas</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>


                    <div class="item" style="background-color:#FD2626;">
                        <img src="../../view/public/img/iconosCategorias/catcombo.png" alt="rusia" style="width:50%;">
                        <div class="carousel-caption" style="color: #ffffff;">
                            <h3>Combos Especiales</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>

                    <div class="item" style="background-color:#FD2626;">
                        <img src="../../view/public/img/iconosCategorias/catbebida.png" alt="colombia" style="width:50%;">
                        <div class="carousel-caption" style="color: #ffffff;">
                            <h3>Bebidas</h3>
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
                    <a href="/Proyecto/view/user/categorias/categoriasuser.php" class=""><img src="/Proyecto/view/public/img/bandejacomida.png" alt="Imagen Bandeja Comida" style="width: 100px; height:100px;"><button type="buttom" class="btn regular-button" style="background: var(--primario); color: white;"> Continuar </button></a>
                </div>
            </div>
        </div>
    </div>
</body>

<br><br><br><br><br><br><br>
<br><br><br><br><br><br>

<?php
incluirTemplate('footer');
?>

</html>