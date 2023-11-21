<style>
    #editButton,#deleteButton{
    display:none;
    }
</style>
<div class="container">
<div class="d-flex justify-content-center">
<div class="row">
<div class="col-md-12 table-responsive" >
   <table class="table table-bordered border-primary table-striped " style="text-align:center" >
    <thead>
        <tr>
            <th scope="col">Seleccinar</th>
            <th scope="col">Id promocion</th>
            <th scope="col">Promocion</th>
            <th scope="col">Total</th>

        </tr>
    </thead>
    <tbody>
    <?php
    include_once ('../crud/conexion.php');
    if(isset($_GET['btnbuscar']))
    {
        $buscar=$_get['txtbuscar'];
        $querycategorias=mysqli_query($conexion,"SELECT id_promo,nom_promo,totalpromo,categorias_idcategoria FROM promocion WHERE id_promo LIKE '".$buscar."%'");
    }
    else
    {
        $querycategorias=mysqli_query($conexion,"SELECT * FROM promocion ORDER BY id_promo ASC");
    }

        while($mostrar=mysqli_fetch_array($querycategorias))
    {
        echo "<tr>";
        echo "<td><div class='form-check' >
        <input  class='form-check-input' type='checkbox' value='' data-doc-promo='" . $mostrar['id_promo'] . "' style='text-align:center' onchange='toggleButtons(this)'/>
        </div></td>";
        echo "<td>"; echo $mostrar['id_promo']; echo "</td>";
        echo "<td>"; echo $mostrar['nom_promo']; echo "</td>";
        echo "<td>"; echo $mostrar['totalpromo']; echo "</td>";
        
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
                    <td><a  class="btn btn-primary" id="addButton" href="../gestion/promociones/pre_promocion.php">Agregar</a></td>
                    <td><a href="../promociones/agregar_promo.php?id_promo=<?php echo $mostrar['idPromo'];?>"   class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a href="../promociones/editar.php?id_promo=<?php echo $mostrar['idPromo'];?>"   class="btn btn-primary" id="editButton">Editar</a></td>
                    <td><a href="../promociones/eliminar_promo.php?id_promo=<?php echo $mostrar['idPromo']; ?>"
               class="btn btn-primary delete-button" id="deleteButton"
               onClick="javascript: return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['idPromo']; ?>?')">Eliminar</a></td>
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