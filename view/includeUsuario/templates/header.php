<div class="">
    <div class="row">
        <div class="col-md-12">

            <header class="header imagen-header">

                <div class="contenedor-header">

                    <div class="barra">

                        <div class="img-logo">


                            <?php
                            if (isset($_SESSION['nombre'])) {
                                echo
                                "<a href='/Proyecto/view/user/index.php'><img src='/Proyecto/view/public/img/logo.jpg' alt='imagen logo' height='70px' height='70%'></a>
                        ";
                            } else {
                                echo "<a href='/Proyecto/index.php'><img src='/Proyecto/view/public/img/logo.jpg' alt='imagen logo' height='70px' height='70%'></a>";
                            }
                            ?>


                        </div>

                        <div class="menu">
                            <img src="/Proyecto/view/public/img/menu.png" width='35px' height='35px' alt="Menu Hamburguesa">
                        </div>



                        <nav class="rutas">

                            <?php
                            if (isset($_SESSION['nombre'])) {
                                echo
                                "<a href='/Proyecto/view/user/index.php'>Inicio</a>
                        <a href='/Proyecto/view/comollegar.php'>como llegar</a>
                        <a href='/Proyecto/view/user/categorias/categoriasuser.php'>Menu</a>
                        <a href='/Proyecto/view/user/sugerenciasuser.php'>Sugerencias</a>
                        <a href='/Proyecto/view/user/perfil.php'>perfil</a>
                        <a href='/Proyecto/controller/usuario/cerrarSesion.php'>Cerrar Sesion</a>
                        <a href='/Proyecto/view/user/productos/carrito.php'>Carrito</a>";
                            } else {
                                echo "
                        <a href='/Proyecto/index.php'>Inicio</a>
                        <a href='/Proyecto/view/comollegar.php'>como llegar</a>
                        <a href='/Proyecto/view/user/categorias/categorias.php'>Menu</a>
                        <a href='/Proyecto/view/sugerencias.php'>Sugerencias</a>
                        <a href='/Proyecto/view/login.php'>Iniciar Sesion</a>
                        <a href='/Proyecto/view/registro.php'>Registrarse</a>";
                            }
                            ?>

                        </nav>

                    </div> <!--Fin Barra del header-->

                    <div class="desplegue">
                        <a href="/Proyecto/index.php">Inicio</a>
                        <a href="/Proyecto/view/comollegar.php">Como llegar</a>
                        <a href="/Proyecto/view/user/categorias/categorias.php">Menu</a>
                        <a href="/Proyecto/view/sugerencias.php">Sugerencias</a>
                        <?php
                        if (isset($_SESSION['nombre'])) {
                            echo
                            "<a href='/Proyecto/view/user/perfil.php'>perfil</a>
                        <a href='/Proyecto/controller/usuario/cerrarSesion.php'>Cerrar Sesion</a>
                        <a href='/Proyecto/view/user/productos/carrito.php'>Carrito</a>";
                        } else {
                            echo
                            "<a href='/Proyecto/view/login.php'>Iniciar Sesion</a>
                        <a href='/Proyecto/view/registro.php'>Registrarse</a>";
                        }
                        ?>

                    </div>

                </div>


        </div>
    </div>
</div>
<script src="/Proyecto/view/public/js/app.js" type="text/javascript"></script>

</header>