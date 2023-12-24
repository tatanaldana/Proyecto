<header class="header imagen-header">

    <div class="contenedor-header">

        <div class="barra">

            <div class="img-logo">

            <?php 
                    if (isset($_SESSION['nombre'])){
                        echo 
                        "<a href='/Proyecto/view/user/index.php'><img src='/Proyecto/view/public/img/logo.jpg' alt='imagen logo' height='70px' height='70%'></a>
                        ";
                    }else{
                        echo "<a href='/Proyecto/index.php'><img src='/Proyecto/view/public/img/logo.jpg' alt='imagen logo' height='70px' height='70%'></a>";
                    }
                ?>


            </div>

            <div class="buscar">
                <form action="/Proyecto/view/includeUsuario/templates/buscar.php" method="POST">
                    <div class="input-group center">
                    
                        <input class="px-4" type="search" name="textbuscar" placeholder="&#128270; Buscar Producto" required>
                        <button  class="input-group-addon" type="submit" name="btnbuscar" style="border-radius:50%; width:30px; height:30px;"><i class='bi bi-search' ></i></button>
                    </div>
                </form>
            </div>  

                <div class="menu">
                    <img src= "/Proyecto/view/public/img/menu.png" width='35px' height='35px' alt="Menu Hamburguesa">
                </div>
            


            <nav class="rutas">

                <?php 
                    if (isset($_SESSION['nombre'])){
                        echo 
                        "<a href='/Proyecto/view/user/index.php'>Inicio</a>
                        <a href='/Proyecto/view/comollegar.php'>como llegar</a>
                        <a href='/Proyecto/view/user/categorias/categoriasuser.php'>Menu</a>
                        <a href='/Proyecto/view/user/sugerenciasuser.php'>Sugerencias</a>
                        <a href='/Proyecto/view/user/perfil.php'>perfil</a>
                        <a href='/Proyecto/controller/usuario/cerrarSesion.php'>Cerrar Sesion</a>
                        <a href='/Proyecto/view/user/carrito/carrito.php'>Carrito</a>";
                    }else{
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
                <a href="/Proyecto/view/categorias/categorias.php">Menu</a>
                <a href="/Proyecto/view/sugerencias.php">Sugerencias</a>
                <?php 
                    if (isset($_SESSION['nombre'])){
                        echo 
                        "<a href='/Proyecto/view/user/perfil.php'>perfil</a>
                        <a href='/Proyecto/controller/usuario/cerrarSesion.php'>Cerrar Sesion</a>
                        <a href='/Proyecto/view/user/carrito/carrito.php'>Carrito</a>";
                    }else{
                        echo 
                        "<a href='/Proyecto/view/login.php'>Iniciar Sesion</a>
                        <a href='/Proyecto/view/registro.php'>Registrarse</a>";
                    }
                ?>

            </div>

    </div>
    <script src="/Proyecto/view/public/js/app.js" type="text/javascript"></script>

</header>