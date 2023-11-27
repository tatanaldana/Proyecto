<?php
require_once '../../../model/conexion.php';


$usar_db = new Conexion();
$conexion = $usar_db->conexion();
$usar_db->set_names();
echo '<pre>';
var_dump($_POST);
echo '</pre>';

editarUsuario(
    $conexion,
    $_POST['id'],
    $_POST['nombre'],
    $_POST['apellido'],
    $_POST['email'],
    (!empty($_POST['genero']) ? $_POST['genero'] : null), // Genero
    $_POST['fecha_naci'],
    (!empty($_POST['tipo_doc']) ? $_POST['tipo_doc'] : null), // Tipo Doc
    (!empty($_POST['doc']) ? $_POST['doc'] : null), // Documento Identidad
    $_POST['tel'],
    $_POST['direccion'],
    (!empty($_POST['clave']) ? $_POST['clave'] : null),
);

function editarUsuario($conexion, $id, $name, $apellido, $email, $genero, $fecha_naci, $tipo_doc, $doc, $tel, $direccion, $clave) {
    try {
        $edt = "UPDATE usuarios SET
            nombre = :nombre,
            apellido = :apellido,
            email = :email,
            genero = :genero,
            fecha_naci = :fecha_naci,
            tipo_doc = :tipo_doc,
            doc = :doc,
            tel = :tel,
            direccion = :direccion,
            clave = MD5(:clave)
        WHERE id = :id";

        $statement = $conexion->prepare($edt);
        
        $statement->bindParam(':nombre', $name, PDO::PARAM_STR);
        $statement->bindParam(':apellido', $apellido, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':genero', $genero, PDO::PARAM_STR);
        $statement->bindParam(':fecha_naci', $fecha_naci, PDO::PARAM_STR);
        $statement->bindParam(':tipo_doc', $tipo_doc, PDO::PARAM_STR);
        $statement->bindParam(':doc', $doc, PDO::PARAM_STR);
        $statement->bindParam(':tel', $tel, PDO::PARAM_STR);
        $statement->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $statement->bindParam(':clave', $clave, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $statement->execute();
        echo 'Filas afectadas: ' . $statement->rowCount(); 
    } catch (PDOException $e) {
        echo 'Error en la consulta: ' . $e->getMessage();
    }



}
?>

<script type="text/javascript">
    alert("Datos Actualizados Exitosamente");
    window.location.href = '../perfil.php';
</script>
