

<form id="formmostrar">
    <!-- Formulario de búsqueda -->
</form>

<!-- Espacio en blanco -->
<div class="my-5"></div> 

<!-- Contenedor de la tabla -->
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-md-12 table-responsive">
                <!-- Tabla de categorías -->
                <table class="table table-bordered border-primary" style="text-align:center">
                    <thead>
                        <tr>
                            <th colspan="3" scope="col">Categorías</th> <!-- Encabezado de la tabla -->
                        </tr>
                        <tr>
                            <th scope="col">Seleccionar</th> <!-- Encabezado de la columna -->
                            <th scope="col">ID Categoría</th> <!-- Encabezado de la columna -->
                            <th scope="col">Nombre Categoría</th> <!-- Encabezado de la columna -->
                        </tr>
                    </thead>
                    <tbody id="filasTabla"></tbody> <!-- Cuerpo de la tabla -->
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Contenedor de botones de acción -->
<div class="container">
    <div class="d-flex justify-content-around">
        <div class="row">
            <!-- Tabla de botones -->
            <table class="table-responsive">                    
                <tr>
<!-- Botones de acción --> <td><a href="../forms/categorias/form_registro.php" class="btn btn-primary" id="addButton">Agregar</a></td>
                   
                
                    <td><a class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a class="btn btn-primary" id="editButton">Editar</a></td>
                    <td><a class="btn btn-primary delete-button" id="deleteButton">Eliminar</a></td>
                </tr> 
            </table>
        </div>
    </div>
</div>
