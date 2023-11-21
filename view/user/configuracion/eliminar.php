<?php
    
    eliminarUsuario($_GET['id']);

    function eliminarUsuario($id){
        require_once '../../conexion/conexion.php';
        $eliminar = "DELETE FROM usuarios WHERE id = '".$id."'";
        $conexion -> query($eliminar) or die ('No se pudo eliminar'.mysqli_error($conexion));
    }

?>

<script type="text/javascript">
    alert("Haz eliminado el usuario");
    window.location.href = '../../login.php';
</script>