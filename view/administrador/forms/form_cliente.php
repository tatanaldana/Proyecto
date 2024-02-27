
<form id="formmostrar">
<div class="container">
<div class="contenedor-busqueda" id="contenedor-busqueda">
<div class="mx-auto" style="width:300px">
<div class="input-group">
  <input type="search" class="form-control rounded" placeholder="Ingrese el documento" aria-label="Buscar" aria-describedby="search-addon" name="buscar" id="buscar"required/>
  <button type="button" class="btn btn-outline-primary" name="btnbuscar" id="btnbuscar">Buscar</button>
</div>
</div>
</div>
</div>
</form>
<div class="my-5"></div>
<div class="container">
<div class="d-flex justify-content-center">
<div class="row">
<div class="col-md-12 table-responsive" >
   <table class="table table-bordered border-primary" style="text-align:center" >
    <thead>
        <tr>
        <th scope="col">Seleccionar</th>
        <th scope="col">Cedula</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Telefono</th>
        <th scope="col">Correo</th>
        </tr>
    </thead>
    <tbody id="filasTabla">
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
                    <td><a href="forms/clientes/form_registro.php" class="btn btn-primary" id="addButton">Agregar</a></td>
                    <td><a class="btn btn-primary" id="viewButton">Visualizar</a></td>
                    <td><a class="btn btn-primary" id="editButton">Editar</a></td>
                    <td><a class="btn btn-primary delete-button" id="deleteButton">Eliminar</a></td>
                </tr> 
            </table>
            </div>
        </div>
    </div>
   