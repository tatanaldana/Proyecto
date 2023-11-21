<?php
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] !=2){
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmacion Datos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <!-- Importamos los estilos de Bootstrap -->
       <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <!-- Font Awesome: para los iconos -->
        <link rel="stylesheet" href="../../../css/font-awesome.min.css">
        <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
        <link rel="stylesheet" href="../../../css/sweetalert.css">
        <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
        <link rel="stylesheet" href="../../../css/style.css">
        <!-- Personalizado daniel  -->
        <link href="../../../css/stylesg.css" rel="stylesheet" type="text/css" media="all">
    
</head>

<?php 
        require '../../../includeUsuario/funciones.php';
        incluirTemplate('header');


        require '../datos.php';

;?>


<body >
  <div class="container"> 
    <h1 class="center" style="color:var(--primario)">Informacion del Cliente</h1>

    <div class="row justify-content-md-center mt-5">
      <div class="col-2 ">
        <p class="p-2 mb-2">Documento: </p>
        <p class="p-2 mb-2">Nombre: </p>
        <p class="p-2 mb-2">Correo: </p>
        <p class="p-2 ">Telefono: </p>

      </div>
    
      <div class="col-6">
        <p class="p-2 bg-light border mb-2"><?php echo ucfirst($_SESSION['doc']);?></p>
        <p class="p-2 bg-light border mb-2"><?php echo ucfirst($_SESSION['nombre']);?></p>
        <p class="p-2 bg-light border mb-2"><?php echo ucfirst($_SESSION['email']);?></p>
        <p class="p-2 bg-light border "><?php echo ucfirst($_SESSION['tel']);?></p>

      </div>

      <div class="col'4 align-items-end">
        <button class='btn-event mb-2 p-2 bg-light ' style = border:none ;><i class='fa fa-edit' style='font-size:20px'></i></button><br>
        <button class='btn-event mb-2 p-2 bg-light' style = border:none ;><i class='fa fa-edit' style='font-size:20px'></i></button><br>
        <button class='btn-event mb-2 p-2 bg-light' style = border:none ;><i class='fa fa-edit' style='font-size:20px'></i></button><br>
        <button class='btn-eventp-2 bg-light' style = border:none ;><i class='fa fa-edit' style='font-size:20px'></i></button>

      </div>

    </div>
  </div>

  <div class="center">
    <a href="pagodireccion.php" class=""><button type="buttom" class="btn regular-button mt-5" style="background: var(--primario); color: white;"> Continuar </button></a>
  </div>


</body>

<br><br><br><br><br><br><br>
    <?php 
   incluirTemplate('footer');
?>

</html>
