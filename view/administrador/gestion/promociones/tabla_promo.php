<style>
    #editButton,#deleteButton{
    display:none;
    }
</style>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered border-primary table-striped" style="text-align:center">
                    <thead>
                        <tr>
                            <th scope="col">Seleccionar</th>
                            <th scope="col">Id promoción</th>
                            <th scope="col">Promoción</th>
                            <th scope="col">Total</th>
                            <th scope="col">id categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../../../model/conexion.php");

                        // Crear instancia de la clase Conexion
                        $conexion = new Conexion();
                        // Establecer la conexión
                        $conexion->conexion();

                        if(isset($_GET['btnbuscar'])) {
                            $buscar = $_GET['txtbuscar'];
                            $querycategorias = $conexion->larausequery("SELECT id_promo, nom_promo, totalpromo, categorias_idcategoria FROM promocion WHERE id_promo LIKE '".$buscar."%'");
                        } else {
                            $querycategorias = $conexion->larausequery("SELECT * FROM promocion ORDER BY id_promo ASC");
                        }

                        foreach ($querycategorias as $mostrar) {
                            echo "<tr>";
                            echo "<td><div class='form-check' ><input class='form-check-input' type='checkbox' value='' data-doc-promo='" . $mostrar['id_promo'] . "' style='text-align:center' onchange='toggleButtons(this)'/></div></td>";
                            echo "<td>{$mostrar['id_promo']}</td>";
                            echo "<td>{$mostrar['nom_promo']}</td>";
                            echo "<td>{$mostrar['totalpromo']}</td>";
                            echo "<td>{$mostrar['categorias_idcategoria']}</td>";
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
                    <td><a class="btn btn-primary" id="addButton" href="../gestion/promociones/pre_promocion.php">Agregar</a></td>
                    <!-- No se puede acceder a $mostrar['idPromo'] aquí -->
                    <td><a href="../promociones/agregar_promo.php" class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a href="../promociones/editar.php" class="btn btn-primary" id="editButton">Editar</a></td>
                    <!-- No se puede acceder a $mostrar['idPromo'] aquí -->
                    <td><a href="../promociones/eliminar_promo.php" class="btn btn-primary delete-button" id="deleteButton" onClick="javascript: return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a></td>
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