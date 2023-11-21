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
            </tr>
            <th colspan="5" scope="col">Categorias</th>
            <tr>
            <th scope="col">Seleccinar</th>
            <th scope="col">Id Categoria</th>
            <th scope="col">Nombre Categoria</th>              
        </tr>
    </thead>

    <tbody>
    <?php

    include_once ('../crud/conexion.php');
        if(isset($_GET['btnbuscar']))
        {
            $buscar=$_get['txtbuscar'];
            $querycategorias=mysqli_query($conexion,"SELECT id_categoria,nombre_cat, FROM categorias WHERE id_categoria LIKE '".$buscar."%'");
        }
        else
        {
            $querycategorias=mysqli_query($conexion,"SELECT * FROM categorias ORDER BY id_categoria ASC");
        }
 
            while($mostrar=mysqli_fetch_array($querycategorias)) {
                
            if($mostrar['id_categoria']!=5){
            echo "<tr>";
            echo "<td><div class='form-check' >
            <input  class='form-check-input' type='checkbox' value='' data-doc-categorias='" . $mostrar['id_categoria'] . "' style='text-align:center' onchange='toggleButtons(this)'/>
            </div></td>";
            echo "<td>"; echo $mostrar['id_categoria']; echo "</td>";
            echo "<td>"; echo $mostrar['nombre_cat']; echo "</td>";
            
            echo "</tr>";
        }
    }
        ?>

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
                    <td><a  class="btn btn-primary" id="addButton" onclick="abrirform()">Agregar</a></td>
                    <td><a href="../categorias/agregar_cat.php?id_cat=<?php echo $mostrar['id_categoria'];?>"   class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a href="../categorias/editar.php?id_cat=<?php echo $mostrar['id_categoria'];?>"   class="btn btn-primary" id="editButton">Editar</a></td>
                    <td><a href="../categorias/eliminar_prod.php?id_cat=<?php echo $mostrar['id_categoria']; ?>"
               class="btn btn-primary delete-button" id="deleteButton"
               onClick="javascript: return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['nombre_pro']; ?>?')">Eliminar</a></td>
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
