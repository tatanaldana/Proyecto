<style>
    #editButton,
    #deleteButton {
        display: none;
    }
</style>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered border-primary table-striped " style="text-align:center">
                    <thead>
                        <tr>
                            <th scope="col">Seleccinar</th>
                            <th scope="col">Id Producto</th>
                            <th scope="col">Nombre Producto</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Precio Producto</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Foto</th>

                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php
require_once("../../../model/conexion.php");

$conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion
$pdo = $conexion->conexion(); // Obtener el objeto de conexión PDO

if ($pdo) {
    if (isset($_POST['btnbuscar'])) {
        $buscar = $_POST['txtbuscar'];
        $queryproductos = $pdo->prepare("SELECT idProducto,nombre_pro,detalle,precio_pro FROM productos WHERE idProducto LIKE :buscar");
        $queryproductos->execute(array(':buscar' => '%' . $buscar . '%'));
    } else {
        $queryproductos = $pdo->query("SELECT * FROM productos ORDER BY idProducto ASC");
    }

    if ($queryproductos) {
        // Resto de tu código para mostrar la tabla de productos
        // ...
    } else {
        echo "Error al ejecutar la consulta.";
    }
} else  {
                            echo "<tr>";
                            echo "<td><div class='form-check' >
            <input  class='form-check-input' type='checkbox' value='' data-doc-producto='" . $mostrar['idProducto'] . "' style='text-align:center' onchange='toggleButtons(this)'/>
            </div></td>";
                            echo "<td>";
                            echo $mostrar['idProducto'];
                            echo "</td>";
                            echo "<td>";
                            echo $mostrar['nombre_pro'];
                            echo "</td>";
                            echo "<td>";
                            echo $mostrar['detalle'];
                            echo "</td>";
                            echo "<td>";
                            echo $mostrar['precio_pro'];
                            echo "</td>";
                            echo "<td>";
                            echo $mostrar['cod'];
                            echo "</td>";
                            echo "<td>";
                            echo "<img src='../../public/img/productos/$mostrar[img]'style='width: 100px; height: 100px; object-fit: cover;' />";
                            echo "</td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="d-flex justify-content-around">
        <div class="row">
            <table class="table-responsive">
                <tr>
                    <td><a class="btn btn-primary" id="addButton" onclick="abrirform()">Agregar</a></td>
                    <td><a href="../productos/agregar_prod.php?idproducto=<?php echo $mostrar['idProducto']; ?>" class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a href="../productos/editar.php?doc=<?php echo $mostrar['idProducto']; ?>" class="btn btn-primary" id="editButton">Editar</a></td>
                    <td><a href="../productos/eliminar_prod.php?idproducto=<?php echo $mostrar['nombre_pro']; ?>" class="btn btn-primary delete-button" id="deleteButton" onClick="javascript: return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['nombre_pro']; ?>?')">Eliminar</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    var deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var confirmDelete = confirm('¿Estás seguro de eliminar este registro?');

            if (!confirmDelete) {
                event.preventDefault(); // Evita que el enlace se ejecute si se cancela la eliminación
            }
        });
    });
</script>