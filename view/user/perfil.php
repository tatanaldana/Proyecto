<?php

session_start();

require_once("../../model/conexion.php");

$db = new Conexion();


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tu Perfil</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
   <link rel="stylesheet" href="/Proyecto/view/public/bootstrap/css/bootstrap.min.css">
       <!-- Font Awesome: para los iconos -->
       <link rel="stylesheet" href="/Proyecto/view/public/css/font-awesome.min.css">
       <!-- Sweet Alert: alertas JavaScript presentables para el usuario  -->
       <link rel="stylesheet" href="/Proyecto/view/public/css/sweetalert.css">
       <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
       <link rel="stylesheet" href="/Proyecto/view/public/css/style.css">
       <!-- Personalizado daniel  -->
       <link href="/Proyecto/view/public/css/stylesg.css" rel="stylesheet" type="text/css" media="all">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>


<?php
require '../includeUsuario/funciones.php';
incluirTemplate('header')
?>

<body>

  <?php

  require_once 'conexion.php';
  require_once 'datos.php';


  echo "

  <div class='container '>

    <div class='perfil mx-auto'>

      <h1 class='text-center my-5'>Perfil de" . ' ' . ucfirst($_SESSION['nombre']) . "</h1>

      <div class='row'>

        <div class='col-sm-5 center'>
        <input type='file'><img src='header/img/logo.jpg' alt='Imagen perfil' class='rounded-circle' width='100px' height='100px'>
          
          <p>" . ucfirst($_SESSION['nombre']) . ' ' . ucfirst($_SESSION['apellido']) . "</p>
        </div>

        <div class='col-sm-5'>
          <p><b>Nombre:</b> " .ucfirst( $_SESSION['nombre']) . "
          <p><b>Apellido:</b> " . ucfirst($_SESSION['apellido']) . "
          <p><b>Correo:</b> " . ucfirst($_SESSION['email']) . "
          <p><b>Genero:</b> " . ucfirst($_SESSION['genero']) . "
          <p><b>Fecha de Nacimiento:</b> " . ucfirst($_SESSION['fecha_naci'] ). "
          <p><b>Tipo de documento:</b> " . ucfirst($_SESSION['tipo_doc'] ). "
          <p><b>Documento de Identidad:</b> " . ucfirst($_SESSION['doc']) . "
          <p><b>Telefono:</b> " . ucfirst($_SESSION['tel'] ). "
          <p><b>Direccion:</b> " . ucfirst($_SESSION['direccion']) . "
        </div>


        <div class='col-sm-2'>
          <a href='configuracion/editar.php?id=" . $_SESSION['id'] . "'><button class='btn-event' style = border:none ;><i class='fa fa-edit' style='font-size:20px'></i></button></a>
                <div class= 'vr'></div>
                <a href='configuracion/eliminar.php?id=" . $_SESSION['id'] . "'><button class='btn-enviar' style = border:none ;><i class='fa fa-trash' style='font-size:20px'></i></button></a>
            </div>
          
          </div>

        </div>
        
        
        
        " ; ?>


  <script src="/Proyecto/view/public/js/app.js" type="text/javascript"></script>


  </div>
</body>

<br><br><br><br><br><br><br>
<?php
incluirTemplate('footer');
?>


</html>