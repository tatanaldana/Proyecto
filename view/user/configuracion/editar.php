<?php
// pagina con todas la propiedades de administrador del software
session_start();

//Validamos que existe un session ademas que el cargo que exista sea igual a 1 que es administrador
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] !=2){
    /* 
    para redireccionar en php se utiliza header
    pero al ser datos enviados por la cabecera debe esjecutarse
    antes de mostrar cualquier informcaionen DOM es por eso que coloco
    el codigo antes de la estructura del html 
    */
    header('location: ../../login.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Update</title>
        <?php
            include '../../includeUsuario/head.php';
        ?>
    </head>

    <?php 
    
     require_once '../../includeUsuario/funciones.php'; 
      incluirTemplate('header')
    ?>

<?php
     

     $consulta = editarFormulario($_GET['id']);
     
    function editarFormulario($ident){
        require_once '../conexion.php';
        $editar = "SELECT * FROM usuarios WHERE doc= '".$ident. "'";
        $resultado = $conexion -> query($editar) or die ('Error'.mysqli_error($conexion));
        $file = $resultado -> fetch_assoc();

        return[
            $file['id'],
            $file['nombre'],
            $file['apellido'],
            $file['email'],
            $file['genero'],
            $file['fecha_naci'],
            $file['tipo_doc'],
            $file['doc'],
            $file['tel'],
            $file['clave'],
            $file['direccion']
            
        ];
    }
?>

<body>
    

<section class="container">

<div class="crear-formulario">
    <h1>Actualiza tu informacion</h1>

    <form action="editar2.php" method = "POST">
    

    <fieldset>
    <legend class="centrado">Datos Personales</legend>

  
        
        <label for="">id</label>
        <input type="hidden" name = "id" value="<?php echo $consulta[0]?>">


        <label for="">Nombre(s): </label>
        <input type="text" name = "nombre" value="<?php echo $consulta[1]?>">
        <?php

        
        echo '<pre>';
         var_dump($consulta[1]);
         var_dump($_SESSION);

         echo '</pre>';

         ?>
        <label for="">Apellido(s): </label>
        <input type="text" name="apellido" value="<?php echo $consulta[2]?>">

        <label for="">Correo: </label>
        <input type="email" name="email" value="<?php echo $consulta[3]?>">

        <label for="">Genero: </label>
       
        <input type="text" name="genero" value=" <?php echo $consulta[4]?>" readonly>
        

        <label for="">Fecha Nacimiento: </label>
        <input type="text" name="fecha_naci" value="<?php echo $consulta[5]?>">

        <label for="">Tipo Doc: </label>
        <input type="text" name="tipo_doc" value="<?php echo $consulta[6]?>" readonly/>
        


        <label for="">Documento Identidad: </label>
        <input type="number" name="doc" value="<?php echo $consulta[7]?>"readonly >

    </fieldset>
    
   <fieldset>
        <legend>Datos de Domicilio</legend>

        <label for="">Telefono: </label>
        <input type="tel" name="tel" value="<?php echo $consulta[8]?>">

        <label for="">Direccion: </label>
        <input type="text" name="direccion" value="<?php echo $consulta[10]?>">


    </fieldset>
    
    <fieldset>

        <legend>Datos Cuenta</legend>
                        
        <label for="">Nueva Contraseña: </label>
        <input type="password" name="clave" >

    </fieldset>

    <br>
    <button type="submit" name="guardar">Guardar</button>
    
    </form>

</div>
</section>
    <a href="../perfil.php"><button type="submit" name="atras">Atras</button></a>
</body>

<br><br><br><br><br><br><br>
    <?php 

       incluirTemplate('footer')

?>




</html>