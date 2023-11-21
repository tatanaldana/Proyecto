<?php
session_start();
include_once '../crud/conexion.php';

global $queryusuarios;
 $queryusuarios=null;

$doc_cliente="";

if (isset($_POST['btncontinuar'])) {
    $buscar = $_POST['txtcontinuar'];

    // Realizamos la búsqueda en la base de datos
    $queryusuarios = mysqli_query($conexion, "SELECT doc, nombre, apellido, tel, email, direccion FROM usuarios WHERE doc = '$buscar' ");

    if (mysqli_num_rows($queryusuarios) > 0) {
        // Se encontraron resultados, procesamos los datos
        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
            $codigo = $mostrar['doc'];
            $nombre = $mostrar['nombre'];
            $apellido = $mostrar['apellido'];
            $telefono = $mostrar['tel'];
            $correo = $mostrar['email'];
            $direccion = $mostrar['direccion'];
        }
        $_SESSION['doc_cliente']=$codigo;
    } else {
        echo '<script type="text/javascript">
        alert("El cliente no esta registrado, por favor genere el registro en sistema");
        window.location.href="../administrador/clientes.php";
      </script>';
    }
}
?>
<?php
    if  (isset($codigo)) {
        // Mostrar los detalles del usuario si existe
        echo "<div class='container'>";
        echo "<div class='d-flex justify-content-center'>";
        echo "<div class='row'>";
        echo "<div class='col-md-12 table-responsive'>";
        echo "<table class='table table-bordered border-primary' style='text-align:center'>";
        echo "<tr><td colspan='3'>Datos del cliente</td></tr>";
        echo '<tr>';
        echo '<td>Codigo: ' . $codigo . '</td>';
        echo '<td>Nombre: ' . $nombre . '</td>';
        echo '<td>Apellido: ' . $apellido . '</td>';
        echo "</tr>";
        echo "<tr>";
        echo '<td>Telefono: ' . $telefono . '</td>';
        echo '<td>Correo: ' . $correo . '</td>';
        echo '<td>Direccion: ' . $direccion . '</td>';
        echo '</tr>';
        echo '</table>';
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>
