<script>
    function abrirform(){
        
        document.getElementById("form_prod").style.display="block";
    }
    function cancelarform(){
        document.getElementById("form_prod").style.display="none";
    }
</script>
<?php
require_once("../../../model/conexion.php");

$conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion
$pdo = $conexion->conexion(); // Obtener el objeto de conexión PDO
?>

<div class="caja_popup" id="form_prod">
    <form action="../gestion/productos/agregar_prod.php" class="contenedor_popup" method="POST" enctype="multipart/form-data">
        <div class="container">
        <div class="d-flex justify-content-center">
        <div class="row">
        <div class="col-md-12 table-responsive" >
        <table class="table table-bordered border-primary table-striped" style="text-align:center" >
            <tbody>
                <tr>
                    <th colspan="2">Nuevo Producto</th>
                </tr>
                <tr>
                <td>Nombre Producto</td>
                    <td><input type="text" name="nombre_pro" required></td>
                </tr>
                <tr>
                <td>Categoria</td>
                <td>
                <form>
                <label for="opciones"></label>
                <select name="opciones" id="opciones">
                    <?php
                     if ($statement) {
                        // Iterar sobre los resultados y mostrar las opciones
                        while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
                            if ($fila['id_categoria'] != 5) {
                                echo "<option value='" . $fila['id_categoria'] . "'>" . $fila['nombre_cat'] . "</option>";
                            }
                        }
                    } else {
                        echo "Error al ejecutar la consulta.";
                    }
                 
            
                    ?>
                </select>
                </form>
                </td>
                </tr>
                <tr>
                    <td>Detalle</td>
                    <td><input type="text" name="detalle" required></td>
                </tr>
                
                <tr>
                    <td>Precio Producto</td>
                    <td><input type="number" name="precio_pro" required></td>
                </tr>
                <tr>
                    <td>codigo</td>
                    <td><input type="text" name="cod" required></td>
                </tr>
                <tr>
                    <td>imagen</td>
                    <td><input type="file" name="img" required></td>
                </tr>


                <tr>
                    <td colspan="2">
                        <button type="button" class="btn btn-outline-primary" onclick="cancelarform()">Cancelar</button>
                        <input type="submit" class="btn btn-outline-primary" name="btnregistrar" value="Registrar" onclick= "javascript:return confirm
                        ('¿Deseas registrar este nuevo producto?');">
                    </td>
                </tr>
            </table>
        </form>
        </div>
        </div>
        </div>
    </div>


    </div>