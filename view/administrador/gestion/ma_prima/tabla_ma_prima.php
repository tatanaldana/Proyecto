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
        <th scope="col">Id </th>
        <th scope="col">Referencia</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Existencia</th>
        <th scope="col">Entrada</th>
        <th scope="col">Salida</th>
        <th scope="col">Stock</th>
        
       
        </tr>
    </thead>
    <tbody>
    <?php
    include_once ('../crud/conexion.php');


        if(isset($_POST['btnbuscar']))
        {
            $buscar=$_POST['txtbuscar'];
            $queryproductos=mysqli_query($conexion,"SELECT cod_materia_pri,referencia,descripcion,existencia,entrada,salida,stock FROM mat_pri WHERE cod_materia_pri LIKE '".$buscar."%'");
        }
        else
        {
            $queryproductos=mysqli_query($conexion,"SELECT * FROM mat_pri ORDER BY cod_materia_pri ASC");
        }
 
            while($mostrar=mysqli_fetch_array($queryproductos))
        {
            echo "<tr>";
            echo "<td><div class='form-check' >
            <input  class='form-check-input' type='checkbox' value='' data-doc-prima='" . $mostrar['cod_materia_pri'] . "' style='text-align:center' onchange='toggleButtons(this)'/>
            </div></td>";
            echo "<td>"; echo $mostrar['cod_materia_pri']; echo "</td>";
            echo "<td>"; echo $mostrar['referencia']; echo "</td>";
            echo "<td>"; echo $mostrar['descripcion']; echo "</td>";
            echo "<td>"; echo $mostrar['existencia']; echo "</td>";
            echo "<td>"; echo $mostrar['entrada']; echo "</td>";
            echo "<td>"; echo $mostrar['salida']; echo "</td>";
            echo "<td>"; echo $mostrar['stock']; echo "</td>";
            
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
                    <td><a  class="btn btn-primary" id="addButton" onclick="abrirform()">Agregar</a></td>
                    <td><a href="../ma_prima/agregar_ma_prima.php?cod_materia_pri=<?php echo $mostrar['cod_materia_pri'];?>"   class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a href="../ma_prima/editar_ma_prima.php?cod_materia_pri=<?php echo $mostrar['cod_materia_pri'];?>"   class="btn btn-primary" id="editButton">Editar</a></td>
                    <td><a href="../ma_prima/eliminar_ma_prima.php?cod_materia_pri=<?php echo $mostrar['referencia']; ?>"
               class="btn btn-primary delete-button" id="deleteButton"
               onClick="javascript: return confirm('¿Estás seguro de eliminar a <?php echo $mostrar['referencia']; ?>?')">Eliminar</a></td>
                </tr> 
            </table>
            </div>
        </div>
    </div>
