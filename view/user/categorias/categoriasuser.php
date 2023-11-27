<?php 

// pagina con todas la propiedades de administrador del software

session_start();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <?php
        include '../../includeUsuario/head.php';
    ?>
</head>

<body>

    <?php
        require_once '../../includeUsuario/funciones.php';
        incluirTemplate('header');
    ?>
<body>

<div class="imagenindex">

<h1>Categorias</h1>

</div>


    
   
         
        <section class="categorias">

            <div class="listado-categorias">
                
                <div class="categoria">
                    <img src="../../public/img/promociones.jpg" alt="img promociones">
                        <div class="texto-categoria">
                            <a href="../carrito/catcombos.php">Combos</a>
                        </div><!--Informacion del producto-->
                </div><!--Produto-->

                <div class="categoria">
                    <img src="../../public/img/pollo.jpg" alt="img pollo">
                        <div class="texto-categoria">
                            <a href="../carrito/catpollo.php">Pollos</a>
                        </div> <!--Informacion del producto--> 
                </div><!--Produto-->

                <div class="categoria">
                    <img src="../../public/img/bebidas.jpg" alt="img bebida">             
                        <div class="texto-categoria">
                            <a href="../carrito/catbebidas.php">Bebidas</a>
                        </div><!--Informacion del producto-->
                </div><!--Produto-->

                <div class="categoria">
                    <img src="../../public/img/pizza.jpg" alt="img pizza">
                        <div class="texto-categoria"> 
                            <a href="../carrito/catpizza.php">Pizzas</a>
                        </div><!--Informacion del producto-->
                </div><!--Produto-->

                <div class="categoria">
                    <img src="../../public/img/especialidades.jpg" alt="img especialidades">
                        <div class="texto-categoria">
                            <a href="../carrito/catespecialidades.php">Especialidades</a>
                        </div><!--Informacion del producto-->
                </div><!--Produto-->

                <div class="categoria">
                    <img src="../../public/img/hamburguesas.jpg" alt="img hamburguesa">
                        <div class="texto-categoria">
                        <a href="../carrito/catburguer.php">Hamburguesas</a>
                    </div><!--Informacion del producto-->
                </div><!--Produto-->
            </div><!--Fin listados de productos-->
            
        </section>
    </main>

</body>

<br><br><br><br><br><br><br>
    <?php   
        incluirTemplate('footer');
    ?>

</html>