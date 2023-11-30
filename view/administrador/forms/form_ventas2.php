<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered border-primary" style="text-align:center">
                    <thead>
                        <tr>
                            <th scope="col">Seleccionar</th>
                            <th scope="col">Cedula</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">ID venta</th>
                            <th scope="col">Total</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once '..\crud\conexion.php';

                        if (isset($_POST['btnbuscar'])) {
                            $buscar = $_POST['txtbuscar'];
                            $queryusuarios = mysqli_query($conexion, "SELECT c.doc_cliente, c.fechaventa, c.carrito_idcarrito, c.totalventa, 
                            CASE WHEN c.estado = 1 THEN 'Preparación' ELSE 'Otro Estado' END AS estado
                            FROM com_venta AS c
                            JOIN carrito AS cv ON c.carrito_idcarrito = cv.id
                            WHERE c.estado = 1 AND c.doc_cliente LIKE '" . $buscar . "%'
                            GROUP BY cv.id");
                        } else {
                            $queryusuarios = mysqli_query($conexion, "SELECT c.doc_cliente, c.fechaventa, c.carrito_idcarrito, c.totalventa, 
                            CASE WHEN c.estado = 1 THEN 'Preparación' ELSE 'Otro Estado' END AS estado
                            FROM com_venta AS c
                            JOIN carrito AS cv ON c.carrito_idcarrito = cv.id
                            WHERE c.estado = 1
                            GROUP BY cv.id");
                        }

                        while ($mostrar = mysqli_fetch_array($queryusuarios)) {
                            echo "<tr>";
                            echo "<td><div class='form-check' >
                                    <input  class='form-check-input' type='checkbox' value='' data-doc-usuario='" . $mostrar['carrito_idcarrito'] . "'
                                    data-doc-usuario2='" . $mostrar['doc_cliente'] . "' style='text-align:center' onchange='toggleButtons(this)'/>
                                    </div></td>";
                            echo "<td>"; echo $mostrar['doc_cliente']; echo "</td>";
                            echo "<td>"; echo $mostrar['fechaventa']; echo "</td>";
                            echo "<td>"; echo $mostrar['carrito_idcarrito']; echo "</td>";
                            echo "<td>"; echo $mostrar['totalventa']; echo "</td>";
                            echo "<td>"; echo $mostrar['estado']; echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
                    <td><a href="../crud_ventas/actualizar_venta.php?doc=<?php echo $mostrar['carrito_idcarrito']; ?>" class="btn btn-primary" id="addButton">Completar</a></td>
                    <td><a href="../crud_ventas/visualizar_venta.php?doc=<?php echo $mostrar['carrito_idcarrito'];?>&doc_cliente=<?php echo $mostrar['doc_cliente']; ?>"
                    class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a href="../crud_ventas/eliminar_venta.php?doc=<?php echo $mostrar['nombre']; ?>" class="btn btn-primary delete-button" id="deleteButton">Eliminar</a></td>
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
