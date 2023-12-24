<?php
    
    eliminarUsuario($_GET['id']);

    function eliminarUsuario($id){
        require_once '../../../model/conexion.php';

        $usar_db = new Conexion();
        $conectar = $usar_db->conexion();  // Obtener la conexión PDO
        $usar_db->set_names();

        $eliminar = "DELETE FROM usuarios WHERE doc = :doc";
        $statement = $conectar->prepare($eliminar);
        $statement->bindParam(':doc', $id, PDO::PARAM_STR);
        $statement->execute();
    //  }catch(PDOException $e){
    //      echo 'Error: ' . $e->getMessage();
    
    }

?>

<script type="text/javascript">
    alert("Haz eliminado el usuario");
    window.location.href = '../../../controller/cerrarSesion.php';
</script>