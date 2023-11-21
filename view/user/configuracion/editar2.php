<?php


    editarUsuario(
        $_POST['id'],
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['email'],
        $_POST['genero'],
        $_POST['fecha_naci'],
        $_POST['tipo_doc'],
        $_POST['doc'],
        $_POST['tel'],
        $_POST['direccion'],
        $_POST['clave']

    );

    function editarUsuario(
        $id, 
        $name,
        $apellido,
        $email,
        $genero,
        $fecha_naci,
        $tipo_doc,
        $doc,
        $tel,
        $direccion,
        $clave



        ){
        require_once('../../conexion/conexion.php');
        $edt = "UPDATE usuarios SET
        nombre='". $name."',
        apellido='".$apellido."',
        email='".$email."',
        genero='".$genero."',
        fecha_naci='".$fecha_naci."',
        tipo_doc='".$tipo_doc."',
        doc='".$doc."',
        tel='".$tel."',
        direccion='".$direccion."',
        clave=MD5('".$clave."')


         
        WHERE id='".$id."' ";

        $conexion -> query($edt) or die ("Error al actualizar datos".mysqli_error($conexion));
    }
?>

<script type="text/javascript">
    alert("Datos Actualizados Exitosamente");
    window.location.href = '../perfil.php';
</script>