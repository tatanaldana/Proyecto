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
    header('location: ../login.php');
}

?>

<!DOCTYPE html>
<html lang="es">


<head>
    <title>La cabaña</title>

    <?php
    include '../../includeUsuario/head.php';
    ?>

</head>

<?php
require_once '../funciones.php';
incluirTemplate('header')
?>



<div class="container">
    <div class="center mb-6">
        <?php
        require_once '../../../model/conexion.php';

        // Assign the connection object to the $conectar variable
        $conectar = new mysqli('localhost', 'root', '', 'arca');

        // Check the connection
        if ($conectar->connect_error){
                die("Connection failed: " . $conectar->connect_error);
            }

        $buscar = $_POST['textbuscar'];

        $queryusuarios = mysqli_query($conectar, "SELECT * FROM productos WHERE nombre_pro like '%" . $buscar . "%'");
        if ($queryusuarios->num_rows > 0){

            while ($mostrar = mysqli_fetch_array($queryusuarios)) {

                $mostrar["img"];
                $mostrar["nombre_pro"];
                $mostrar["precio_pro"];
        ?>
                <div class="contenedor_productos">
                    <div><img src="../../public/img/productos/<?php echo $mostrar["img"]; ?>" alt="Imagen del producto" style='width: 100px; height: 100px; object-fit: cover;' /></div>
                    <div>
                        <form method="POST" action="../../user/productos/carrito.php?accion=agregar&cod=<?php echo $mostrar["cod"]; ?>">
                            
                                <div style="padding-top:20px;font-size:18px;"><?php echo $mostrar["nombre_pro"]; ?></div>
                                <div style="padding-top:10px;font-size:20px;"><?php echo "$" . $mostrar["precio_pro"]; ?></div>
                                <div class="d-flex flex-column align-items-center">
                                    <input type="text" name="txtcantidad" value="1" size="1" class="mb-2" />
                                    <input type="submit" value="Agregar" style="background: var(--primario); color: white; border:none; padding:10px; width:100%;" />
                            </form>
                    </div>
                </div>
    </div>



<?php
            }
        } else {
            echo '<div class="pantallaerror">';
            echo "<img src='../../public/img/Error.png' alt='Imagen de error' style = 'width: 300px; height: 300px;' class = 'center'>
                <h2>Lo sentimos, no encontramos Nada relacionado con tu busqueda</h2>";
            echo '</div>';
        }
?>

</div>
</div>
<div class="center">
    <a href="javascript:history.back(1)"><button type="button" class="btn regular-button" style="background: var(--primario); color: white;">Regresar</button></a>
</div>



<br><br><br><br><br><br><br>
<?php
incluirTemplate('footer')
?>